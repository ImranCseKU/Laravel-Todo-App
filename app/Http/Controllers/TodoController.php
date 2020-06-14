<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index(){

        //fatch all todos from database
        $todos = Todo::all();

        //display them in the todos.index page
        return view('todos.index', compact('todos'));

        // return view('todos.index')->with('todos', Todo::all() );
    }

    public function show( Todo $todo){  //route model building
        
        // $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);

    }

    public function create(){

        return view('todos.create');

    }

    public function store(){
        
        $this->validate( request(), [
            'name'=> 'required|max:40',
            'description'=> 'required',
        ]);

        $data = request()->except('_token');
        // Todo::create($data);     //execute if and only if the form field and database tabel field matched

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash("success", "Todo created successfully");

        return redirect()->to('/todos');

    }


    public function edit( Todo $todo){

        return view('todos.edit')->with('todo', $todo);
    }

    public function update( Todo $todo){

        $this->validate( request(), [
            'name'=> 'required|max:40',
            'description'=> 'required',
        ]);

        $data = request()->except('_token');

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        
        session()->flash("success", "Todo updated successfully");
        return redirect('/todos');

    }


    public function destroy(Todo $todo){

        $todo->delete();

        session()->flash("success", "Todo deleted successfully");
        return redirect('/todos');
    }

    public function complete(Todo $todo){

        $todo->completed = true;
        $todo->save();

        session()->flash('success', "Todo completed successfully");

        return redirect('todos');

    }
}
