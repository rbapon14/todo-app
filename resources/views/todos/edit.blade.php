<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
</head>
<body>
    <h1>Edit Todo</h1>
    <form action="{{ route('todos.update', $id) }}" method="POST">
        @csrf
        <input type="text" name="todo" value="{{ $todos[$id] }}" required>
        <button type="submit">Update Todo</button>
    </form>
    <a href="{{ route('todos.index') }}">Back to Todo List</a>
</body>
</html>


{{-- <form action="/todos/update/{{ $id }}" method="POST">
    @csrf
    <input type="text" name="todo" value="{{ $todos[$id] }}">
    <button type="submit">Update Todo</button>
</form> --}}
