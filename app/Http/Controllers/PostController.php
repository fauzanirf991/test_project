<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $tittle = '';

        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $tittle = ' in '.$category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $tittle = ' by '.$author->name;
        }


        return view('posts',[
            "active" => "Posts",
            "tittle"=> "All Posts".$tittle,
            "posts" => Post::latest()->filter(request(['search','category','author']))
            ->paginate(13)->withQueryString()
        ]);

    }
    public function show(Post $post){
        return view('post' , [
            "tittle" => "Singgle post",
            "active" => "Posts",
            "post" => $post
        ]);
    }
}
