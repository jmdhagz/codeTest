<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostController extends Controller
{
	private $user;
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware(function ($request, $next) {
           $this->user= Auth::user();

           return $next($request);
        });
	}

    public function index()
    {
    	$post_list = Post::join('users', 'posts.users_id', '=', 'users.id')
    					->where('posts.users_id', $this->user->id)
    					->select(['posts.id', 'posts.description', 'posts.remark', 'users.name', 'posts.created_at'])
    					->orderBy('posts.created_at', 'DESC')->get();

    	return view('post', compact('post_list'));
    }

    public function getCreate()
    {
    	return view('create');
    }

    public function postCreate(Request $request)
    {
    	$post = new Post();
    	$post -> users_id = $this->user->id;
    	$post -> description = $request->description;
    	$post -> remark = $request->remark == 'on' ? 1 : 0;
    	$post -> save();

    	return redirect('posts');
    }

    public function getPost($id)
    {
    	$post = Post::find($id);
    	return view('edit', compact('id', 'post'));
    }

    public function postEdit(Request $request)
    {
    	$post = Post::find($request->id);
    	$post -> description = $request->description;
    	$post -> remark = $request->remark == 'on' ? 1 : 0;
    	$post -> save();

    	return redirect('posts');
    }

    public function getDelete($id)
    {
    	$post = Post::find($id);
    	return view('delete', compact('id', 'post'));
    }

    public function postDelete($id)
    {
    	$post = Post::find($id);
    	$post -> delete();
    	
    	return redirect('posts');
    }
}
