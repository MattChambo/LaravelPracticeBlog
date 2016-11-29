<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{
    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	// First() is same as get but get first one
    	$post = Post::where('slug', '=', $slug)->first();


    	// return the view and pass in the post object
    	 return view('blog.single')->withPost($post);
    }
}
