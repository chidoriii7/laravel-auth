<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {

        $posts = Post::where('id', '>', 0)->orderBy('id', 'DESC')->get();

        return view('guest.posts.index', compact('posts'));
    }

}
