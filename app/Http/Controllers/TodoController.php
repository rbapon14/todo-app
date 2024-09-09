<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = session()->get('todos', []);
        dd($todos);
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

        return redirect()->route('todos.index');
    }

    public function edit($id)
    {
        $todos = session()->get('todos', []);
        
        if (!isset($todos[$id])) {
            return redirect()->route('todos.index');
        }

        return view('todos.edit', compact('todos', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'todo' => 'required'
        ]);

        $todos = session()->get('todos', []);
        if (!isset($todos[$id])) {
            return redirect()->route('todos.index');
        }
        $todos[$id] = $request->todo;
        
        session(['todos' => $todos]);

        return redirect()->route('todos.index');
    }

    public function destroy($id)
    {
        $todos = session()->get('todos', []);
        if (!isset($todos[$id])) {
            return redirect()->route('todos.index');
        }
        unset($todos[$id]);
        
        session(['todos' => $todos]);

        return redirect()->route('todos.index');
    }
}



// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class TodoController extends Controller
// {
//     public function index()
//     {
//         $todos = session()->get('todos', []);
//         dd(session()->get('todos', []));

//         return view('todos.index', compact('todos'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'todo' => 'required'
//         ]);

//         $todos = session()->get('todos', []);

//         $todos[] = $request->todo;

//         session(['todos' => $todos]);

//         dd(session()->get('todos'));

//         return redirect()->back();
//     }

//     public function edit($id)
//     {
//         $todos = session()->get('todos', []);

//         if (!isset($todos[$id])) {
//             return redirect()->back();
//         }

//         return view('todos.edit', compact('todos', 'id'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'todo' => 'required'
//         ]);

//         $todos = session()->get('todos', []);

//         $todos[$id] = $request->todo;

//         session(['todos' => $todos]);

//         return redirect('/todos');
//     }

//     public function destroy($id)
//     {
//         $todos = session()->get('todos', []);

//         unset($todos[$id]);

//         session(['todos' => $todos]);

//         return redirect()->back();
//     }
// }

