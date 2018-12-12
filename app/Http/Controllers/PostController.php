<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(auth()->user()->favorites->toArray());
        return view('post.index', [
            'posts' => Post::orderBy('created_at', 'DESC')->get(),
            'favorites' => array_map(function ($fav) {
                return $fav['id'];
            }, auth()->user()->favorites->toArray())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3|max:100',
            'body' => 'required|min:3'
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'body' => $data['body']
        ]);

        return redirect()->back();
    }
}
