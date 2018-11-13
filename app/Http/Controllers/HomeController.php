<?php

namespace App\Http\Controllers;

use App\BusinessPage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bpages = BusinessPage::all();

        return view('home', [
            'bpages' => $bpages,
        ]);
    }
}
