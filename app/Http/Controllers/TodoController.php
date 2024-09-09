<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = session()->get('todos', []);
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todos = session()->get('todos', []);

        $todos[] = $request->todo;

        session(['todos' => $todos]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $todos = session()->get('todos', []);

        if (!isset($todos[$id])) {
            return redirect()->back();
        }

        return view('todos.edit', compact('todos', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todos = session()->get('todos', []);

        $todos[$id] = $request->todo;

        session(['todos' => $todos]);

        return redirect('/todos');
    }

    public function destroy($id)
    {
        $todos = session()->get('todos', []);

        unset($todos[$id]);

        session(['todos' => $todos]);

        return redirect()->back();
    }
}

