<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\PostVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->paginate(10);
        return view('posts.index', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post_visit = PostVisit::where('user_id', '=', Auth::user()->id)->where('post_id', '=', $id)->first();

        if($post_visit === null){
            $post_visit = new PostVisit();
            $post_visit->user_id = Auth::user()->id;
            $post_visit->post_id = $id;
            $post_visit->save();
        } else {
            $post_visit->touch();
        }

        $post = Post::find($id);

        if (($post == null)) {
            abort(404);
        }

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($id !== 'new') {
            $post = Post::find($id);
        } else {
            $post = new Post;
        }

        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {

        if ($id !== 'new') {
            $post = Post::find($id);
        } else {
            $post = new Post;
        }

        $post->fill($request->validated());
        $post->user_id = $request->user()->id;
        $post->save();

        if ($request->post('save_close') !== null) {
            return redirect(route('posts.index'));
        } else {
            return redirect(route('posts.edit', $post->id));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (Auth::user()->id === $post->user_id) {
            $post->delete();
        }

        return back();
    }
}
