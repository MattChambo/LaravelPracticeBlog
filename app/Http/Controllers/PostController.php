<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
// Pretty sure App\Post namespaces in the model
use App\Post;
 // Session is namespaced here
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Create a variable and store all the blog posts from the database
        $posts = Post::all();

        // Return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            // The title field must be filled in and cannot be more than 255 characters
            // The body field must be filled in too to pass validation
                'title' => 'required|max:255',
                'body' => 'required'
            ));

        // Store in the database
        // new Post refers to the post model
        $post = new Post;

        // Gets data from form
        $post->title = $request->title;
        $post->body = $request->body;

        // saves data in the database
        $post->save();
        
        Session::flash('success','The blog post was successfully saved');

        // Redirects user to posts.show with id from post table
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Post::find() accesses the model, find primary id from database
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        // with sends the post variable to the view
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the database and save as a variable
        $post = Post::find($id);
        // Return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $this->validate($request, array(
            // The title field must be filled in and cannot be more than 255 characters
            // The body field must be filled in too to pass validation
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        // Save the data to the database
        // Find the existing item we want to update
        $post = Post::find($id);

        // Change old data to the data in the form
        // Input gets content from either post or get perameters
        $post->title = $request->input('title'); 
        $post->body = $request->input('body');

        $post->save();
        // set flash data with success message
        Session::flash('success', 'This post was successfully saved.');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'The post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
