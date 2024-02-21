<?php

namespace App\Livewire\Todo;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Todo extends Component
{
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.todo.todo');
    }
}
