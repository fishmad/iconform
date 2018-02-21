<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;

class PermissionController extends Controller
{
    public function __construct() 
    {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('app.settings.permissions.index')->with('permissions', $permissions);
    }
		
		
		
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $permission = Permission::findOrFail($id);
      
      $roles = $permission->roles()->get();

      $users = User::permission($permission)->get();

      return view('app.settings.permissions.show', compact('permission', 'roles', 'users'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::find($id);
        $roles = Role::get();
        
        return view('app.settings.permissions.edit', compact('permission'))->with('roles', $roles);
    }
		
		

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();

        return view('app.settings.permissions.create')->with('roles', $roles);
    }

		
		
		
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        
        if ($permission->name == "Administer roles & permissions") {
            return redirect('app/settings/permissions')->with('flash_danger','WARNING This system requires the permission "' . $permission->name . '" to function correctly. You cannot delete this!');
						// return abort(401);
        }
        
        $permission->delete();

        return redirect('app/settings/permissions')->with('flash_message','Deleted permission: ' . $permission->name);
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:255',
        ]);

        // Grab 'only' the posted 'permissions specific fields' and cast into variable called: $input, except 'role[] fields' as this gets saved into a seperate db table 'role_has_permissions'.
        $input = $request->except(['roles']);

        // Now grab the posted array of 'roles[]' form fields and cast into a second variable called $roles.
        $roles = $request['roles'];

        // Now save the $input into the 'permissions db' (i.e: name,title,description).
        $permission->fill($input)->save();

        // Sync any newley ticked roles[x] as $roles data - update the reference table: role_has_permissions
        if (isset($roles)) {        
          $permission->roles()->sync($roles);   
        } else {
        // Remove any unticked roles[o] references in table: role_has_permissions 
          $permission->roles()->detach();
        }

        return redirect('app/settings/permissions')->with('flash_message','Permission ' . $permission->name . ' updated!');
    }

		
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $permission = new Permission();
        $input = $request->except(['roles']);
        $permission->fill($input)->save();

        $permission->name = $request->name;
        $roles = $request['roles'];

        if (!empty($request['roles'])) {
          foreach ($roles as $role) {
            $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

            $permission = Permission::where('name', '=', $permission->name)->first();   
            $r->givePermissionTo($permission);
          }
        }

        return redirect('app/settings/permissions')->with('flash_message','Permission ' . $permission->name . ' added!');
    }








}
