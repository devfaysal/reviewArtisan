<?php

namespace App\Http\Controllers;

use App\BusinessPage;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Division;
use App\District;
use App\Thana;

class BusinessPageController extends Controller
{
    public function __construct(){
        $this->middleware('role:superadministrator')->except('publicView');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bpages = BusinessPage::all();
        return view('manage.businessPages.index')->withBpages($bpages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        $districts = District::all();
        $thanas = Thana::all();
        return view('manage.businessPages.create')->withDivisions($divisions)->withDistricts($districts)->withThanas($thanas);
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
            'business_name' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'thana' => 'required',
            'district' => 'required',
            'division' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            // 'status' => 'required',
            'logo' => 'mimes:jpg,jpeg,bmp,png|nullable|max:1024',
            'banner' => 'mimes:jpg,jpeg,bmp,png|nullable|max:1024'
            
        ]); 
        
        //Handle Logo Upload
        if($request->hasFile('logo')){
            $logoNameWithExt = $request->file('logo')->getClientOriginalName();

            $logoName = pathinfo($logoNameWithExt, PATHINFO_FILENAME);

            $logoExtension = $request->file('logo')->getClientOriginalExtension();

            $logoNameToStore = $logoName.'_'.time().'.'.$logoExtension;

            $path = $request->file('logo')->storeAs('public/logos', $logoNameToStore);
        }else{
            $logoNameToStore = 'dummyLogo.png';
        }
        //Handle Banner Upload
        if($request->hasFile('banner')){
            $bannerNameWithExt = $request->file('banner')->getClientOriginalName();

            $bannerName = pathinfo($bannerNameWithExt, PATHINFO_FILENAME);

            $bannerExtension = $request->file('banner')->getClientOriginalExtension();

            $bannerNameToStore = $bannerName.'_'.time().'.'.$bannerExtension;

            $path = $request->file('banner')->storeAs('public/banners', $bannerNameToStore);
        }else{
            $bannerNameToStore = 'dummyBanner.png';
        }

        $page = new BusinessPage;

        $page->slug = $request->slug;
        $page->owner_id = Auth::user()->id;
        $page->country = $request->country;
        $page->business_name = $request->business_name;
        $page->category = $request->category;
        $page->address = $request->address;
        $page->city = $request->city;
        $page->postal_code = $request->postal_code;
        $page->thana = $request->thana;
        $page->district = $request->district;
        $page->division = $request->division;
        $page->phone = $request->phone;
        $page->email = $request->email;
        $page->website = $request->website;
        $page->logo = $logoNameToStore;
        $page->banner = $bannerNameToStore;
        $page->status = 0;

        $page->save();

        if($page->save()){
            Session::flash('message', 'Business page has been added successfully!!'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('business-pages.show', $page->id);
        }else{
            Session::flash('message', 'Problem occured when saving Business Page, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('business-pages.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessPage $businessPage)
    {
        return view('manage.businessPages.show', compact('businessPage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessPage  $businessPage
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessPage $businessPage)
    {
        $divisions = Division::all();
        $districts = District::all();
        $thanas = Thana::all();
        return view('manage.businessPages.edit', compact('businessPage'))->withDivisions($divisions)->withDistricts($districts)->withThanas($thanas);
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
        $this->validate($request, [
            'business_name' => 'required',
            'category' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'thana' => 'required',
            'district' => 'required',
            'division' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            // 'status' => 'required',
            // 'logo' => 'mimes:jpg,jpeg,bmp,png|nullable|max:1999',
            // 'banner' => 'mimes:jpg,jpeg,bmp,png|nullable|max:1999'
            
        ]); 
        
        //Handle Logo Upload
        if($request->hasFile('logo')){
            $logoNameWithExt = $request->file('logo')->getClientOriginalName();

            $logoName = pathinfo($logoNameWithExt, PATHINFO_FILENAME);

            $logoExtension = $request->file('logo')->getClientOriginalExtension();

            $logoNameToStore = $logoName.'_'.time().'.'.$logoExtension;

            $path = $request->file('logo')->storeAs('public/logos', $logoNameToStore);
        }else{
            $logoNameToStore = 'dummyLogo.png';
        }
        //Handle Banner Upload
        if($request->hasFile('banner')){
            $bannerNameWithExt = $request->file('banner')->getClientOriginalName();

            $bannerName = pathinfo($bannerNameWithExt, PATHINFO_FILENAME);

            $bannerExtension = $request->file('banner')->getClientOriginalExtension();

            $bannerNameToStore = $bannerName.'_'.time().'.'.$bannerExtension;

            $path = $request->file('banner')->storeAs('public/banners', $bannerNameToStore);
        }else{
            $bannerNameToStore = 'dummyBanner.png';
        }

        $page = $businessPage;

        $page->country = $request->country;
        $page->business_name = $request->business_name;
        $page->category = $request->category;
        $page->address = $request->address;
        $page->city = $request->city;
        $page->postal_code = $request->postal_code;
        $page->thana = $request->thana;
        $page->district = $request->district;
        $page->division = $request->division;
        $page->phone = $request->phone;
        $page->email = $request->email;
        $page->website = $request->website;
        $page->logo = $logoNameToStore;
        $page->banner = $bannerNameToStore;
        $page->status = 0;

        $page->save();

        if($page->save()){
            Session::flash('message', 'Business page has been updated successfully!!'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('business-pages.show', $page->id);
        }else{
            Session::flash('message', 'Problem occured when updating Business Page, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('business-pages.edit', $page->id);
        }
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

    public function publicView($slug)
    {
        $bpage = BusinessPage::where('slug', '=', $slug)->first();

        return view('public.businessPage')->withBpage($bpage);
    }

    public function apiCheckUnique(Request $request){
        return json_encode(!BusinessPage::where('slug', '=', $request->slug)->exists());
    }

    public function getDistricts(Request $request){
        $division = $request->division;
        $districts = District::where('division_id', $division)->get();
        return json_encode($districts);
    }

    public function getDivisions(Request $request){
        $divisions = Division::select('id AS value', 'name AS text')->get();
        return json_encode($divisions);
    }
}
