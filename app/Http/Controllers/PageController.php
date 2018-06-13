<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Page;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class PageController extends Controller
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_browse_list'))) {
        //   return abort(401);
        // }

        $page = Page::all();

        $columns = DB::getSchemaBuilder()->getColumnListing('pages');
        //$columns = ['id', 'name', 'slug', 'description']; // need solution to automate creation of these..
        
        return view('page.index', compact('columns', 'page'));
    }


    public function datatables()
    {
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_browse_list'))) {
        //   return abort(401);
        // }

        // $page = page::select(['id', 'name', 'updated_at']);
        $page = Page::all();

        return Datatables::of($page)
        ->addColumn('action', function ($page) {
          return ('
            <a href="/page/' . $page->id . '/edit" title="Edit" class="btn btn-success btn-sm">
            <i class="fa fa-fw fa-edit"></i>
            </a>
            <a href="/page/' . $page->id . '" title="View" class="btn btn-primary btn-sm">
            <i class="fa fa-fw fa-search-plus"></i>
            </a>
            <form method="POST" action="/page/' . $page->id . '" accept-charset="UTF-8" style="display:inline">
              <input name="_method" type="hidden" value="DELETE">
              <input name="_token" type="hidden" value="' . csrf_token() . '">
              <button type="button" class="btn btn-sm btn-danger" title="Delete" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm delete" 
                data-message="Last chance! this action can not be reversed. Are you sure you want to delete the page with ID: ' . $page->id . ', ' . $page->name . '?">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
              </button>
            </form>
          ');
        })

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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_add_create'))) {
        //   return abort(401);
        // }
        return view('page.create');
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_add_create'))) {
        //   return abort(401);
        // }
        $this->validate($request, [
          'name' => 'required'
        ]);

        $requestData = $request->all();
        Page::create($requestData);

        return redirect('page')->with('success', 'Page added!');
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_read_show'))) {
        //   return abort(401);
        // }
        $page = Page::findOrFail($id);

        return view('page.show', compact('page'));
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_edit_update'))) {
        //   return abort(401);
        // }
        $page = Page::findOrFail($id);

        return view('page.edit', compact('page'));
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_add_create'))) {
        //   return abort(401);
        // }

        $this->validate($request, [
          'name' => 'required'
        ]);
        
        $page = Page::findOrFail($id);
        $page->update($request->all());

        return redirect(route('page'))->withSuccess('Page was updated!');
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
        // if ((!Gate::allows('page_all')) && (!Gate::allows('page_delete_destroy'))) {
        //   return abort(401);
        // }

        $page = Page::findOrFail($id);
        Page::destroy($id);

        return redirect('page')->with('flash_message', 'Page deleted!');
    }


}
