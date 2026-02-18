<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $perPage = (int) $request->input('per_page', 10);
        $search  = $request->input('search', '');

        $posts = Post::query()
            ->when($search, function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.posts.index', compact('posts', 'perPage', 'search'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:280|unique:posts,slug',
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'status'       => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $data['admin_id'] = auth('admin')->id();

        Post::create($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post creado correctamente.');
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:280|unique:posts,slug,' . $post->id,
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'status'       => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $post->update($data);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post actualizado correctamente.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post eliminado correctamente.');
    }
}
