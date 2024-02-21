<div>
    @include('livewire.todo.includes.create-todo-box')
    @include('volt-livewire::todo.includes.search-box')
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.todo.includes.todo-card')
        @endforeach

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
</div>
