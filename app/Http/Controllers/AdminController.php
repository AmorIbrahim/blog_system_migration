<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $posts = Post::count();

        return view('admin.dashboard', compact('users', 'posts'));
    }
}
