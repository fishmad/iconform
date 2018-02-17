<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.default');
    }
}
