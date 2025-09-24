<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index(Request $request)
    {
        $users = User::latest()->paginate(5);
        $posts = Post::latest()->paginate(5);

        if ($request->ajax()) {
            if ($request->type == 'users') {
                return view('partials.users', compact('users'))->render();
            }
            if ($request->type == 'posts') {
                return view('partials.posts', compact('posts'))->render();
            }
        }

        return view('admin.index', compact('users', 'posts'));
    }
    public function loadMore(Request $request)
    {
        $page = $request->get('page', 1);
        $type = $request->get('type');

        if ($type === 'users') {
            $users = User::paginate(10, ['*'], 'page', $page);
            return view('partials.users', compact('users'))->render();
        }

        if ($type === 'posts') {
            $posts = Post::paginate(10, ['*'], 'page', $page);
            return view('partials.posts', compact('posts'))->render();
        }

        return '';
    }
        public function edit($id)
    {
        $post = Post::findOrFail($id);

        if (Auth::id() !== $post->user_id && Auth::user()->type !== 'admin') {
            abort(403, 'غير مسموح لك بتعديل هذا المقال');
        }

        return view('admin.edit', compact('post'));
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

        return redirect()->route('dashboard')->with('success', 'تم تعديل المقال بنجاح!');
    }

}
