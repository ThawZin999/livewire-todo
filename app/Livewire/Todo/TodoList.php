<?php

namespace App\Livewire\Todo;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;
    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $editTodoId;

    #[Rule('required|min:3|max:50')]
    public $editTodoName;

    public function create(){
        $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');
        session()->flash('success', 'Created');
        $this->resetPage();

    }

    public function edit($id){
            $this->editTodoId = $id;
            $todo = Todo::find($id);
            $this->editTodoName = $todo->name;
        }

    public function toggle(Todo $todo) {
        $todo->completed =!$todo->completed;
        $todo->save();
    }

    public function delete(Todo $todo) {
        $todo->delete();
    }

    public function cancelEdit(){
        $this->reset('editTodoName', 'editTodoId');
    }

    public function update(){
        $this->validateOnly("editTodoName");
        Todo::find($this->editTodoId)->update([
            'name'=> $this->editTodoName
        ]);
        $this->cancelEdit();
    }
    public function render()
    {

        return view('livewire.todo.todo-list', ['todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)]);
    }
}
