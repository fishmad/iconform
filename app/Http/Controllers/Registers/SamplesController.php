<?php

namespace App\Http\Controllers\Registers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Gate;
use App\Sample;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class SamplesController extends Controller
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
        // if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_browse_list'))) {
        //   return abort(401);
        // }

        $columns = ['id', 'name', 'image', 'date'];
        //$samples = Sample::all();

        $samples = DB::getSchemaBuilder()->getColumnListing('samples');

        return view('app.registers.samples.index', compact('columns', 'samples'));
    }


    public function datatables()
    {
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_browse_list'))) {
          return abort(401);
        }

        // $samples = Sample::select(['id', 'title', 'email', 'description', 'updated_at']);
        $samples = Sample::all();

        return Datatables::of($samples)

        // ->editColumn('title', function($samples) {
        //   $url = route('app.registers.samples.show', $samples->id);
        //   return '<a href="' . $url . '">' . $samples->title . '</a>';
        // })
        ->rawColumns(['title', 'action'])
        ->addColumn('action', function ($samples) {
          return view('app.registers.samples.includes.actionButtons', compact('samples'))->render();
        })
        ->make(true);
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
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_read_show'))) {
          return abort(401);
        }
        $sample = Sample::findOrFail($id);

        return view('app.registers.samples.show', compact('sample'));
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
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_edit_update'))) {
          return abort(401);
        }
        $sample = Sample::findOrFail($id);

        return view('app.registers.samples.edit', compact('sample'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_add_create'))) {
          return abort(401);
        }
        return view('app.registers.samples.create');
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
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_delete_destroy'))) {
          return abort(401);
        }

        $sample = Sample::findOrFail($id);
        Sample::destroy($id);

        return redirect('app/registers/samples')->with('success', 'Deleted! sample with email: ' . $sample->email);
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
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_add_create'))) {
          return abort(401);
        }
        $this->validate($request, [
          'name' => 'required'
        ]);

        $requestData = $request->all();
        Sample::create($requestData);

        return redirect('app/registers/samples')->with('success', 'Sample added!');
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
        if ((!Gate::allows('samples_all')) && (!Gate::allows('samples_add_create'))) {
          return abort(401);
        }

        $this->validate($request, [
          'name' => 'required'
        ]);
        
        $requestData = $request->all();
        $sample = Sample::findOrFail($id);
        $sample->update($requestData);

        return redirect(route('app.registers.samples.index'))->withSuccess('sample ' . $sample->title . ' was updated!');
    }


}
