<form action="/todos" method="POST">
    @csrf
    <input type="text" name="todo" placeholder="Enter new todo">
    <button type="submit">Add Todo</button>
</form>

<a href="/todos/edit/{{ $key }}">Edit</a>

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
</ul>

