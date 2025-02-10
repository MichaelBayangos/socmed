<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{

    public $post;
    public $content;

    protected $rules = [
        'content' => 'required|min:3'
    ];

    public function addComment()
    {
        $this->validate();

        $this->post->comments()->create([
            'content' => $this->content,
            'user_id' => auth()->id(),
        ]);

        $this->reset('content');
    }



    public function render()
    {
        return view('livewire.comments');
    }
}
