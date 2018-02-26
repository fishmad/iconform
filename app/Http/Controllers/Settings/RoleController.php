<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use DB;
use Yajra\Datatables\Datatables;

class RoleController extends Controller
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
        $columns = ['id', 'name'];
        $roles = Role::all();

        return view('app.settings.roles.index', compact('columns', 'roles'));
    }


    public function datatables()
    {
        $roles = Role::all();
        return Datatables::of($roles)
        ->addColumn('action', function ($roles) {
          return view('app.settings.roles.includes.actionButtons', compact('roles'))->render();
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $role = Role::findOrFail($id);

      $permissions = $role->permissions()->orderBy('item_order', 'asc')->get()->groupBy('groupings');

      $users = User::role($role)->get();

      return view('app.settings.roles.show', compact('role', 'permissions', 'users'));

    }
	

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::findOrFail($id);

      $permissions = Permission::orderBy('groupings_order', 'asc')->orderBy('item_order', 'asc')->get()->groupBy('groupings');

      return view('app.settings.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permissions = Permission::orderBy('groupings_order', 'asc')->orderBy('item_order', 'asc')->get()->groupBy('groupings');

        return view('app.settings.roles.create', compact('permissions'));
    }

	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
		
        if ($role->id == 1 | $role->id == 2) { // I am Super Administrator or Admin
            return redirect('app/settings/roles')->with('flash_danger','WARNING You cannot delete "System Admistrator" roles these are required for security.');
			  // return abort(401);
        }
		
        $role->delete();

        return redirect('app/settings/roles')->with('flash_message','Role deleted!');
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
          'name'=>'required|unique:roles|max:10',
          'permissions' =>'required',
          ]
        );

        $name = $request['name'];
        $role = new Role();
        $role->name = $name;

        $permissions = $request['permissions'];

        $role->save();

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail();
            $role = Role::where('name', '=', $name)->first();
            $role->givePermissionTo($p);
        }

        return redirect('app/settings/roles')->with('flash_message', $role->name . ' was created!');
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
        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name'=>'required|max:50|unique:roles,name,'.$id,
            'permissions' =>'required',
        ]);

        $input = $request->except(['permissions']);
        $permissions = $request['permissions'];
        $role->fill($input)->save();
        $p_all = Permission::all();

        foreach ($p_all as $p) {
            $role->revokePermissionTo($p);
        }

        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); //Get corresponding form permission in db
            $role->givePermissionTo($p);  
        }

        return redirect('app/settings/roles')->with('flash_message', $role->name . ' role has been updated!');
    }


}
