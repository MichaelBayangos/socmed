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

    /**
     * The mount method is Livewire's equivalent of a constructor. It is called when the component is first initialized.
     * In this case, it finds the authenticated user and loads all their posts into a public property.
     */
    public function mount()
    {
        $this->user = User::find(auth()->id());
        $this->posts = $this->user->post()->get();
    }

    /**
     * Toggles the like status of a post for the authenticated user.
     *
     * @param int $postId The ID of the post to toggle the like.
     *
     * If the user has already liked the post, the like will be removed.
     * If the user has not liked the post, a new like will be added.
     */

    public function toggleLike($postId)
    {
        $post = Post::find($postId);
        $user = auth()->user();

        if ($post->likes->where('user_id', $user->id)->first()) {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
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

