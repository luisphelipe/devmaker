<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritePostController extends Controller
{
    public function index() {
        return view('post.index', [
            'pageTitle' => 'Favoritos',
            'posts' => auth()->user()->favorites()->orderBy('created_at', 'DESC')->get(),
            'favorites' => array_map(function ($fav) {
                return $fav['id'];
            }, auth()->user()->favorites->toArray())
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'post_id' => 'required|exists:posts,id'
        ]);

        auth()->user()->favorites()->toggle($data['post_id']);

        return redirect()->back();
    }
}
