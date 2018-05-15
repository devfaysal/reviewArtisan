<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use App\BusinessPage;
use Auth;
use Session;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $bpage = BusinessPage::where('slug', '=', $slug)->first();
        return view('public.review.create')->withBpage($bpage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {

        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
        // exit();
        $this->validate($request, [
            'content' => 'required|min:100|max:300',
            'rating' => 'required'
        ]);

        $bpage = BusinessPage::where('slug', '=', $slug)->first();

        $review = new Review;

        $review->author_id = Auth::user()->id;
        $review->business_page_id = $bpage->id;
        $review->content = $request->content;
        $review->rating = $request->rating;

        $review->save();

        Session::flash('success', 'Your Review has been added successfully');
        return redirect()->route('business-page.public', $bpage->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
