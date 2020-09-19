<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;     //todo model (trait)

class todosController extends Controller
{
    /**
     * get all todos
     * @return void
     */
    public function index()
    {
       // $todos = \App\Todo::all();
        $todos = Todo::all();

        //return view('todos', ['todos'=> $todos]);
        return view('todos.index')->with('todos', $todos);
        //return view('todos', compact('todos'));
    }


    /**
     * get todo by id
     * @param [type] $todo
     * @return void
     */
    public function show($todo)
    {
        //$todo = Todo::find($todo);
        //return $todo;

        return view('todos.show')->with('todo', Todo::find($todo));
        //return view('todos.show', ['todo'=> $todos]);
    }

    /**
     * create new todo
     * @return void
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * insert data in data base and validating data
     * @param Request $request
     * @return void
     */
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

    /**
     * get data by id From data base To make an edit
     * @param [type] $todo
     * @return void
     */
    public function edit($todo)
    {
        $todo = Todo::find($todo);
        return view('todos.edit')->with('todo', $todo);
    }


    /**
     *validation and update data 
     * @param Request $request
     * @param [type] $todo
     * @return void
     */
    public function update(Request $request, $todo)
    {
        $request->validate([
            'todoTitle' => 'required | min:5',
            'todoDescription' => 'required | min:5'
        ]);

        $todo = Todo::find($todo);
        $todo->title = $request->get('todoTitle');
        $todo->description = $request->get('todoDescription');
        $todo->save();

        return redirect('/todos');

    }


}
