<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;     //todo model (trait)
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

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        //dd($request);
        //dd(request()->all()); //show request data
        //return $request->all();
        //return $request->input('todoTitle'); //get data
        //return $request->todoTitle;  //get data

        /*
        // validation method 1
        $request->validate([
            'todoTitle' => 'required | min:5',
            'todoDescription' => 'required'
        ]);
        */

        //validation method 2
        $this->validate($request,[
            'todoTitle' => 'required | min:5',
            'todoDescription' => 'required | min:5'
        ]);


        $todo = new Todo();
        $todo->title = $request->input('todoTitle');
        $todo->description = $request->input('todoDescription');
        $todo->save(); //save data

        return redirect('/todos'); // redirect url

    }


}
