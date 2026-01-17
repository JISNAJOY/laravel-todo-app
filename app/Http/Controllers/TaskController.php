<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all tasks for the logged-in user
        $tasks = auth()->user()->tasks()->latest()->paginate(5);

        // Pass tasks to the view
        return view('tasks.index', compact('tasks'));

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
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
  
    public function edit(Task $task)
    {
        // Check if the logged-in user owns this task
        $this->authorize('update', $task);

        // If check passes, show the edit form
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update($request->validated());

        return redirect()->route('tasks.index')
                         ->with('success', 'Task updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
                         ->with('success', 'Task deleted successfully');
    }

    # Task’s completion status methos
    public function toggleComplete(Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        return back();
    }
}
