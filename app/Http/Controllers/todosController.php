<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class todosController extends Controller
{
    public function index()
    {
       // $todos = \App\Todo::all();
        $todos = Todo::all();

        //return view('todos', ['todos'=> $todos]);
        return view('todos.index')->with('todos', $todos);
        //return view('todos', compact('todos'));
    }


    public function show($todo)
    {
        //$todo = Todo::find($todo);
        //return $todo;

        return view('todos.show')->with('todo', Todo::find($todo));
        //return view('todos.show', ['todo'=> $todos]);
    }
}
