<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{

    public $post;
    public $content;

    protected $rules = [
        'content' => 'required'
    ];

    public function addComment()
    {
        $this->validate();

        Comment::query()->create([
            'content' => $this->content,
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
        ]);

        $this->reset('content');
    }   

    public function delete(Comment $comment)
    {
        // Delete the comment
        $comment->Delete();
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
