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
        return view('todos.todos')->with('todos', $todos);
        //return view('todos', compact('todos'));
    }

}
