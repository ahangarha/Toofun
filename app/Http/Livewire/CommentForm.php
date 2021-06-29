<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentForm extends Component
{
    public String $token;
    public String $text = '';

    protected $rules = [
        'text' => 'required|string|min:10|max:1000',
        'token' => 'required|size:16',
    ];

    public function store()
    {
        $this->validate();

        $comment = new Comment();
        $comment->topic_token = $this->token;
        $comment->text = $this->text;
        $comment->save();
        $this->text = '';
        session()->flash('message', 'Post successfully updated.');
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
