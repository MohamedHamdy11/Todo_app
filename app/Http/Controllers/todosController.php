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
    public function show(Todo $todo)
    {
        //$todo = Todo::find($todo); == (Todo $todo)
        //return $todo;

        return view('todos.show')->with('todo', $todo);
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

        $request->session()->flash('success', 'Todo Created Successfully');

        return redirect('/todos'); // redirect url

    }

    /**
     * get data by id From data base To make an edit
     * @param [type] $todo
     * @return void
     */
    public function edit( Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }


    /**
     *validation and update data
     * @param Request $request
     * @param [type] $todo
     * @return void
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'todoTitle' => 'required | min:5',
            'todoDescription' => 'required | min:5'
        ]);

        $todo->title = $request->get('todoTitle');
        $todo->description = $request->get('todoDescription');
        $todo->save();

        $request->session()->flash('success', 'Todo Updated Successfully');

        return redirect('/todos');

    }


    /**
     *delete todo by id
     * @param [type] $todo
     * @return void
     */
    public function destroy(Todo $todo) //route model binding = ($todo = Todo::find($todo))
    {
        $todo->delete();

        session()->flash('success', 'Todo Deleted Successfully');

        return redirect('/todos');
    }

    public function complete(Todo $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo Completed Successfully');

        return redirect('/todos');

    }

}
