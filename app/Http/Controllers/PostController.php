<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'Title'   => 'required|string|max:255',
        'Content' => 'required|string',
        'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
        'Title'   => $request->Title,
        'Content' => $request->Content,
        'user_id' => Auth::id(),
        'image'   => $imagePath,
        ]);

        return redirect()->route('home')->with('success', 'تم إضافة المقال بنجاح!');
    }
}
