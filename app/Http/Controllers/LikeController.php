<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Ensure the user is authenticated
    public function toggleLike(Post $post)
    {
        $user = Auth::user();

        // Check if the like already exists
        $like = $post->likes()->where('user_id', $user->id)->first();

        if ($like) {
            // Unlike: delete the like record
            $like->delete();
        } else {
            // Like: create a new like record
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
        }

        return back();
    }
}
