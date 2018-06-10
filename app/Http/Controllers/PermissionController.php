<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Session;
use DB;
use Yajra\Datatables\Datatables;

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
    $columns = ['id', 'name', 'label', 'item_order', 'groupings', 'groupings_order'];
    // $columns = DB::getSchemaBuilder()->getColumnListing('$permissions');

    // $samples = Permission::select(['id', 'label', 'item_order', 'groupings', 'groupings_order', 'updated_at']);
    $permissions = Permission::all();

    return view('permissions.index', compact('columns', 'permissions'));
  }


  /**
	 * Display a Datatable listing of the resource.
	 *
	 * @return Yajra\Datatables\Datatables
	 */
	public function datatables()
	{
    $permissions = Permission::all();

    return Datatables::of($permissions)


    ->addColumn('action', function ($permissions) {
			return ('
				<a href="/permissions/' . $permissions->id . '/edit" title="Edit" class="btn btn-success btn-sm">
				<i class="fa fa-fw fa-edit"></i>
				</a>
				<a href="/permissions/' . $permissions->id . '" title="View" class="btn btn-primary btn-sm">
				<i class="fa fa-fw fa-search-plus"></i>
				</a>
				<form method="POST" action="/permissions/' . $permissions->id . '" accept-charset="UTF-8" style="display:inline">
					<input name="_method" type="hidden" value="DELETE">
					<input name="_token" type="hidden" value="' . csrf_token() . '">
					<button type="button" class="btn btn-sm btn-danger" title="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" 
						data-message="Last chance! this action can not be reversed. Are you sure you want to delete the permission with ID: ' . $permissions->id . ', ' . $permissions->name . '?">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
					</button>
				</form>
			');
    })
    // ->addColumn('action', function ($permissions) {
    //   return view('permissions.includes.actionButtons', compact('permissions'))->render();
    // })

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
    $permission = Permission::findOrFail($id);
    $roles = $permission->roles()->get();
    $users = User::permission($permission)->get();

    return view('permissions.show', compact('permission', 'roles', 'users'));

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
    
    return view('permissions.edit', compact('permission'))->with('roles', $roles);
  }
		
		

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $roles = Role::get();

    return view('permissions.create')->with('roles', $roles);
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
    
    // if ($permission->name == "Administer roles & permissions") {
    //     return redirect('/permissions')->with('flash_danger','WARNING This system requires the permission "' . $permission->name . '" to function correctly. You cannot delete this!');
    // 		// return abort(401);
    // }
    
    $permission->delete();

    return redirect('/permissions')->with('success','deleted permission: ' . $permission->name);
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

    return redirect('/permissions')->with('success','permission ' . $permission->name . ' updated!');
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

      return redirect('/permissions')->with('success','Permission ' . $permission->name . ' added!');
  }








}
