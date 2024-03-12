<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
/**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('completed',0)->orderBy('due_date')->get();

        return view('tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:tasks|max:255',
            'description' => 'nullable',
            'due_date' => 'required|'
        ]);
    
        Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'due_date'=>$request->due_date,
            'completed'=>false
        ]);

        return response('Data is added succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.archieve',compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $task = Task::findorFail($id);
       
       return view('tasks.edit', compact('task'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findorFail($id);
        
        $task->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'due_date'=>$request->due_date
        ]);

        

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::destroy($id);

        return redirect()->route('tasks.index');
    }

    public function forceDelete(string $id)
    {
        Task::withTrashed()->where('id', $id)->forceDelete();

        return redirect()->back();
    }
    
}
