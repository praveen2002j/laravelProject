<?php

namespace App\Http\Controllers;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todo(){
        $todos = Todo::all();
        return view('todos.todo',['todos'=>$todos]);
    }

    public function create(){
        return view('todos.create');
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
            'due_date' => 'nullable|date',
        ]);
         
        $newtodo =Todo::create($data);
     

        return redirect()->route('todos.todo')->with('success', 'Todo created successfully');
    }

    public function edit(Todo $todo){
         return view('todos.edit',['todo'=>$todo]);
    }

    
    public function update(Todo $todo, Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|boolean',
        'due_date' => 'nullable|date',
    ]);

    $todo->update($data);

    return redirect()->route('todos.todo')->with('success', 'Todo updated successfully');
}

public function destroy(Todo $todo){
      $todo->delete();
      return redirect()->route('todos.todo')->with('success', 'Todo deleted successfully');
}

}
