<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function createPost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $incomingFields['user_id'] = Auth::id();

        Post::create($incomingFields);
        return redirect('/');
    }

    public function showEditPostScreen(Post $post)
    {
        if (Auth::id() !== $post['user_id']) {
            return redirect('/');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function editPost(Post $post, Request $request)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        $post->update($incomingFields);
        return redirect('/');
    }

    public function deletePost(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return redirect('/');
        }

        $post->delete();
        return redirect('/');
    }
}
