<?php

namespace App\Livewire\Posts;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreatePost extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.posts.create-post');
    }
}
