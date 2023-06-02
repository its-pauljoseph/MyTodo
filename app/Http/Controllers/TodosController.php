<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;
use Illuminate\Validation\ValidationException;

class TodosController extends Controller
{
    public function index(){
        $todo = Todos::all();
        return view('index')->with('todos', $todo);
    }

    public function create(){
        return view('create');
    }

    public function details(Todos $todo){

    return view('details')->with('todos', $todo);

}
    
    public function edit(){
    
        return view('edit');
    
    }
    
    // The Update function
    public function update(Todos $todo){

        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

       
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');

    }
    // End of update function
    
    public function delete(Todos $todo){

        $todo->delete();

        return redirect('/');

    }

    // Store Controller
    public function store(){


        try {
            $this->validate(request(), [
                'name' => ['required'],
                'description' => ['required']
            ]);
        } catch (ValidationException $e) {
        }


        $data = request()->all();


        $todo = new Todos();
        //On the left is the field name in DB and on the right is field name in Form/view
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();

        session()->flash('success', 'Todo created successfully');

        return redirect('/');

    }
}
