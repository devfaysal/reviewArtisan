<?php

namespace App\Http\Controllers;

use App\BusinessPage;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Division;
use App\District;

class BusinessPageController extends Controller
{
    public function __construct(){
        $this->middleware('role:superadministrator');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('manage.businessPages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('manage.businessPages.create')->withDivisions($divisions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessPage $businessPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessPage $businessPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessPage $businessPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessPage $businessPage)
    {
        //
    }

    public function apiCheckUnique(Request $request){
        return json_encode(!BusinessPage::where('slug', '=', $request->slug)->exists());
    }

    public function getDistricts(Request $request){
        $division = $request->division;
        $districts = District::where('division_id', $division)->get();
        return json_encode($districts);
    }
}
