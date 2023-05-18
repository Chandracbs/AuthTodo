<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function index()
    {   
        // $todos =  Todo:: table('todos')->where('user_id','=','1')->get();
        $todos = Todo:: select('id','title','is_completed')->where('user_id',Auth::id())->get();

        return view('todo.index',compact('todos'));
    }


    public function store(Request $request)
    {
        Todo::create([
            'title'=>$request->title,
            'user_id'=>Auth::user()->id,


        ]);
        // Todo::create($request->all());

        return redirect()->route('index')->with('success', 'Inserted');
    }

    public function edit(string $id)
    {
        $todos = Todo::where('user_id',Auth::id())->findOrFail($id);
        return view('todo.edit',compact('todos'));
    }

    public function create()
    {
        //
    }



    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $todos = Todo::findOrFail($id);
        $todos->update($request->all());
        return redirect()->route('index')->with('success','Todo updated successfully');
    }


    public function destroy(string $id)
    { 
        $todos = Todo::findOrFail($id);
        $todos->delete();
        return redirect()->route('index')->with('success','Todo deleted successfully');
    }
}
