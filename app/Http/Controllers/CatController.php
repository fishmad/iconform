<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Cat;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        /* Permissions: add 'cat_all' and 'cat_browse_list' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_browse_list')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $cat = Cat::all();

        /* Dynamic */
        $columns = DB::getSchemaBuilder()->getColumnListing('cats');
        // /* Targeted */
        // $columns = ['id', 'name', 'date'];     

        return view('cat.index', compact('columns', 'cat'));
    }


    public function datatables()
    {
        /* Permissions: add 'cat_all' and 'cat_browse_list' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_browse_list')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        // $cats = cat::select(['id', 'name', 'updated_at']);
        $cat = Cat::all();

        return Datatables::of($cat)

        ->addColumn('action', function ($cat) {
          return ('
            <a href="/cat/' . $cat->id . '/edit" title="Edit" class="btn btn-success btn-sm">
            <i class="fa fa-fw fa-edit"></i>
            </a>
            <a href="/cat/' . $cat->id . '" title="View" class="btn btn-primary btn-sm">
            <i class="fa fa-fw fa-search-plus"></i>
            </a>
            <form method="POST" action="/cat/' . $cat->id . '" accept-charset="UTF-8" style="display:inline">
              <input name="_method" type="hidden" value="DELETE">
              <input name="_token" type="hidden" value="' . csrf_token() . '">
              <button type="button" class="btn btn-sm btn-danger" title="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" 
                data-message="Last chance! this action can not be reversed. Are you sure you want to delete the cat with ID: ' . $cat->id . ', ' . $cat->name . '?">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
              </button>
            </form>
          ');
        })

        // ->addColumn('action', function ($cat) {
        //   return view('cat.includes.actionButtons', compact('cat'))->render();
        // })

        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        /* Permissions: add 'cat_all' and 'cat_add_create' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_add_create')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }
        
        return view('cat.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        /* Permissions: add 'cat_all' and 'cat_add_create' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_add_create')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $this->validate($request, [
          'name' => 'required'
        ]);

        $requestData = $request->all();
        Cat::create($requestData);

        return redirect('cat')->with('success', 'Cat added!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        /* Permissions: add 'cat_all' and 'cat_read_show' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_read_show')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $cat = Cat::findOrFail($id);

        return view('cat.show', compact('cat'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        /* Permissions: add 'cat_all' and 'cat_edit_update' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_edit_update')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $cat = Cat::findOrFail($id);

        return view('cat.edit', compact('cat'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        /* Permissions: add 'cat_all' and 'cat_edit_update' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_edit_update')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $this->validate($request, [
          'name' => 'required'
        ]);
        
        $cat = Cat::findOrFail($id);
        $cat->update($request->all());

        return redirect(route('cat'))->withSuccess('Cat was updated!');
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        /* Permissions: add 'cat_all' and 'cat_delete_destroy' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('cat_delete_destroy')) {
        //     if (Gate::denies('cat_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $cat = Cat::findOrFail($id);
        Cat::destroy($id);

        return redirect('cat')->with('flash_message', 'Cat deleted!');
    }


}
