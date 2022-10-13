<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPosts;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $users = User::all()->count();
        $posts = BlogPosts::all()->count();
        $categories = Categories::all()->count();
        $comments = Comments::all()->count();


        return view('backend.home.index', compact('users', 'posts', 'categories', 'comments'));
    }
}
