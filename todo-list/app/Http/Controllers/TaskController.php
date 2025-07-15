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
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('task', compact('tasks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'priority' => 'nullable|string',
            'location' => 'nullable|string',
            'reminder_at' => 'nullable|date',
            'is_urgent' => 'nullable|boolean',
            'notes' => 'nullable|string',
        ]);

        // Checkbox handling (karena unchecked tidak dikirim)
        $validated['is_urgent'] = $request->has('is_urgent');

        Task::create($validated);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function update(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        return redirect()->back()->with('success', 'Status tugas diperbarui.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Tugas dihapus.');
    }

    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }
}
