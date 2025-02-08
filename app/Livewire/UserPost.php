<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class UserPost extends Component
{
    // Public properties are accessible in the view
    public $user;
    public $posts;

    public function mount()
    {
        // Find the authenticated user
        $this->user = User::find(auth()->id());

        // Assuming your User model has a "post" relationship that returns multiple posts,
        // assign the retrieved posts to a public property.
        $this->posts = $this->user->post()->get();
    }

    public function toggleLike($postId)
    {
        $post = Post::find($postId);
        $user = auth()->user();

        // Check if the user already liked the post.
        if ($post->likes->where('user_id', $user->id)->first()) {
            // Remove the like (adjust this code based on your like relationship logic)
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            // Add a like. Ensure your likes relationship is set up to allow creation.
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
        }
    }
    public function render()
    {
        return view('livewire.user-post');
    }
}
