<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Incident;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class IncidentsController extends Controller
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
        /* Permissions: add 'incidents_all' and 'incidents_browse_list' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_browse_list')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $incidents = Incident::all();

        /* Dynamic */
        $columns = DB::getSchemaBuilder()->getColumnListing('incidents');
        // /* Targeted */
        // $columns = ['id', 'name', 'date'];     

        return view('incidents.index', compact('columns', 'incidents'));
    }


    public function datatables()
    {
        /* Permissions: add 'incidents_all' and 'incidents_browse_list' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_browse_list')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        // $incidentss = incidents::select(['id', 'name', 'updated_at']);
        $incidents = Incident::all();

        return Datatables::of($incidents)

        ->addColumn('action', function ($incidents) {
          return ('
            <a href="/incidents/' . $incidents->id . '/edit" title="Edit" class="btn btn-success btn-sm">
            <i class="fa fa-fw fa-edit"></i>
            </a>
            <a href="/incidents/' . $incidents->id . '" title="View" class="btn btn-primary btn-sm">
            <i class="fa fa-fw fa-search-plus"></i>
            </a>
            <form method="POST" action="/incidents/' . $incidents->id . '" accept-charset="UTF-8" style="display:inline">
              <input name="_method" type="hidden" value="DELETE">
              <input name="_token" type="hidden" value="' . csrf_token() . '">
              <button type="button" class="btn btn-sm btn-danger" title="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" 
                data-message="Last chance! this action can not be reversed. Are you sure you want to delete the incidents with ID: ' . $incidents->id . ', ' . $incidents->name . '?">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
              </button>
            </form>
          ');
        })

        // ->addColumn('action', function ($incidents) {
        //   return view('incidents.includes.actionButtons', compact('incidents'))->render();
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
        /* Permissions: add 'incidents_all' and 'incidents_add_create' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_add_create')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }
        
        return view('incidents.create');
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
        /* Permissions: add 'incidents_all' and 'incidents_add_create' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_add_create')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $this->validate($request, [
          'name' => 'required'
        ]);

        $requestData = $request->all();
        Incident::create($requestData);

        return redirect('incidents')->with('success', 'Incident added!');
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
        /* Permissions: add 'incidents_all' and 'incidents_read_show' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_read_show')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $incidents = Incident::findOrFail($id);

        return view('incidents.show', compact('incidents'));
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
        /* Permissions: add 'incidents_all' and 'incidents_edit_update' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_edit_update')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $incidents = Incident::findOrFail($id);

        return view('incidents.edit', compact('incidents'));
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
        /* Permissions: add 'incidents_all' and 'incidents_edit_update' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_edit_update')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $this->validate($request, [
          'name' => 'required'
        ]);
        
        $incidents = Incident::findOrFail($id);
        $incidents->update($request->all());

        return redirect(route('incidents.index'))->withSuccess('Incident was updated!');
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
        /* Permissions: add 'incidents_all' and 'incidents_delete_destroy' into the Permissions list and assign them to a authorised user */
        // if (Gate::denies('incidents_delete_destroy')) {
        //     if (Gate::denies('incidents_all')) {
        //         return abort(401, '401 Unauthorized! User does not have required permission to access this resource.');
        //     }
        // }

        $incidents = Incident::findOrFail($id);
        Incident::destroy($id);

        return redirect('incidents')->with('flash_message', 'Incident deleted!');
    }


}
