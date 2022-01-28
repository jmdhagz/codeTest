<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_list = Post::join('users', 'posts.users_id', '=', 'users.id')
                        ->where('posts.remark', 0)
                        ->select(['posts.id', 'posts.users_id', 'posts.description', 'posts.remark', 'users.name', 'posts.created_at'])
                        ->orderBy('posts.created_at', 'DESC')->get();

        return view('home', compact('post_list'));
    }

    public function userPosts()
    {
        return view('post');
    }
}
