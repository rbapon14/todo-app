<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <input type="text" name="todo" placeholder="Enter new todo" required>
        <button type="submit">Add Todo</button>
    </form>

    <ul>
        @forelse($todos as $key => $todo)
            <li>
                {{ $todo }}
                <a href="{{ route('todos.edit', $key) }}">Edit</a>
                <form action="{{ route('todos.destroy', $key) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @empty
            <li>No todos available</li>
        @endforelse
    </ul>
</body>
</html>





{{-- <form action="/todos" method="POST">
    @csrf
    <input type="text" name="todo" placeholder="Enter new todo">
    <button type="submit">Add Todo</button>
</form>

@if(!empty($todos) && is_array($todos))
    <ul>
        @foreach($todos as $key => $todo)
            <li>
                {{ $todo }} 
                <a href="/todos/edit/{{ $key }}">Edit</a>
                <form action="/todos/delete/{{ $key }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@else
    <p>No todos available.</p>
@endif


<form action="/todos/delete/{{ $key }}" method="POST">
    @csrf
    <button type="submit">Delete</button>
</form>

<ul>
    @foreach($todos as $key => $todo)
        <li>{{ $todo }} <a href="/todos/edit/{{ $key }}">Edit</a>
        <form action="/todos/delete/{{ $key }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Delete</button>
        </form>
        </li>
    @endforeach
</ul> --}}

