<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostList extends Component
{
    public $posts;

    // When the component mounts, load posts.
    public function mount()
    {
        $this->loadPosts();
    }

    // A helper method to load posts with their related user and likes.
    public function loadPosts()
    {
        $this->posts = Post::with(['user', 'likes'])->orderBy('id', 'desc')->get();
    }

    // Method to handle toggling likes.
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

        // Reload posts so the view reflects the updated likes count.
        $this->loadPosts();
    }
    public function render()
    {
        return view('livewire.post-list');
    }
}
