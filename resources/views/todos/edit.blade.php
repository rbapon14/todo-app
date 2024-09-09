<form action="/todos/update/{{ $id }}" method="POST">
    @csrf
    <input type="text" name="todo" value="{{ $todos[$id] }}">
    <button type="submit">Update Todo</button>
</form>
