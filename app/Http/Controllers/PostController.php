<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id() && Auth::user()->type !== 'admin') {
            return redirect()->route('home')->with('error', 'غير مسموح لك بحذف هذا المقال!');
        }

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('success', 'تم حذف المقال بنجاح!');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id && Auth::user()->type !== 'admin') {
            abort(403, 'غير مسموح لك بتعديل هذا المقال');
        }

        return view('posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id && Auth::user()->type !== 'admin') {
            abort(403, 'غير مسموح لك بتعديل هذا المقال');
        }

        $request->validate([
            'Title'   => 'required|string|max:255',
            'Content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->Title   = $request->Title;
        $post->Content = $request->Content;
        $post->save();

        return redirect()->route('home')->with('success', 'تم تعديل المقال بنجاح!');
    }

}
