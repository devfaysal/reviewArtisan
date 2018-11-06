<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;
use Auth;

class PostController extends Controller
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
        $posts = Post::with('author')->get();
        return view('manage.posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.posts.create');
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
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
        ]);

        $post = new Post;

        $post->slug = $request->slug;
        $post->author_id = Auth::user()->id;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        //$post->status = $request->status;
        //$post->type = $request->type;
        $post->published_at = $request->published_at ?? null;

        $post->save();

        if($post->save()){
            Session::flash('message', 'Post created successfully!!'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('posts.show', $post->id);
        }else{
            Session::flash('message', 'Problem occured when saving Post, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('posts.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('manage.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('manage.posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->content = $request->content;
        //$post->status = $request->status;
        //$post->type = $request->type;
        $post->published_at = $request->published_at ?? null;

        $post->save();

        if($post->save()){
            Session::flash('message', 'Post Updated successfully!!'); 
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('posts.show', $post->id);
        }else{
            Session::flash('message', 'Problem occured when saving Post, Try Again!!'); 
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('posts.edit', $post->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function apiCheckUnique(Request $request){
        return json_encode(!Post::where('slug', '=', $request->slug)->exists());
    }
}
