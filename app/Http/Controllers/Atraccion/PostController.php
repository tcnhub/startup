<?php

namespace App\Http\Controllers\Atraccion;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    private function user()
    {
        return Auth::guard('atraccion')->user();
    }

    public function index(Request $request)
    {
        $user   = $this->user();
        $perPage = (int) $request->input('per_page', 10);
        $search  = $request->input('search', '');

        $posts = $user->posts()
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('atraccion.posts.index', compact('posts', 'perPage', 'search'));
    }

    public function create()
    {
        return view('atraccion.posts.create');
    }

    public function store(Request $request)
    {
        $user = $this->user();

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:280|unique:posts,slug',
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'status'       => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $data['author_type'] = get_class($user);
        $data['author_id']   = $user->id;

        Post::create($data);

        return redirect()->route('atraccion.posts.index')
            ->with('success', 'Post creado correctamente.');
    }

    public function show(Post $post)
    {
        $this->authorizePost($post);
        return view('atraccion.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorizePost($post);
        return view('atraccion.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizePost($post);

        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'slug'         => 'required|string|max:280|unique:posts,slug,' . $post->id,
            'excerpt'      => 'nullable|string',
            'content'      => 'required|string',
            'status'       => 'required|in:draft,published,scheduled,archived',
            'published_at' => 'nullable|date',
        ]);

        $post->update($data);

        return redirect()->route('atraccion.posts.index')
            ->with('success', 'Post actualizado.');
    }

    public function destroy(Post $post)
    {
        $this->authorizePost($post);
        $post->delete();
        return redirect()->route('atraccion.posts.index')
            ->with('success', 'Post eliminado.');
    }

    private function authorizePost(Post $post): void
    {
        $user = $this->user();
        if ($post->author_type !== get_class($user) || $post->author_id !== $user->id) {
            abort(403);
        }
    }
}
