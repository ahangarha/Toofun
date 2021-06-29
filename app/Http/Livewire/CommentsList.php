<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentsList extends Component
{
    public $comments;

    public function render()
    {
        return view('livewire.comments-list');
    }
}
