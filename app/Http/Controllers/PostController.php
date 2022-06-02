<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index(){
        // dd(Request('search')); to cactch data in request url
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in '. $category->name;
        }

        if(request('user')){
            $user = User::firstWhere('slug', request('user'));
            $title = ' in '. $user->name;
        }

        return view('posts', [
            "title" => "Data Posts".$title,
            "active" => 'posts',
            // "posts" => Post::all() //this is collection datas
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString() //this to show latest post and user eager load (with in model post), and filter from is scopeFilter in model post
        ]); 
    }

    public function show(Post $post){
        return view('post', [
            "title" => 'post',
            "active" => 'posts',
            'post' => $post,
        ]);
    }
}
