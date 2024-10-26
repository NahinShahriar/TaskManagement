<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 

class TaskController extends Controller
{
    

    public function index()
    {
        return view('addtask');
    }

    public function store(Request $request)
    {
        $data=$request->all();
        // echo "<pre>";
        // print_r($data);die;
        Task::create($data);
       return redirect()->route('addtask')->with('success', 'Task added successfully!');

    }
        public function view()
    {
       // $datas = Task::all();  // Retrieve all tasks
       $datas = Task::where('status_active',1)->get();

    // print_r($datas);
        return view('viewtask', compact('datas'));
    }
         public function edit($task_id)
    {
        $data = Task::findorfail($task_id);  // Retrieve all tasks

//print_r($datas);
        return view('edittask', compact('data'));
    }
    public function update(Request $request, $task_id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::findOrFail($task_id);  // Find the task by ID
        $task->update($request->only(['title', 'description', 'status', 'due_date']));  // Update the task

        return redirect()->route('viewtask')->with('success', 'Task updated successfully!');
    }

    // public function delete($task_id)
    // {
    //     $data=Task::findOrFail($task_id);
    //    // $data->delete($data);
    //     $data->status_active = 0; // Mark as inactive
    //      $data->save();
    //     return redirect()->route('viewtask')->with('Success','Data Deleted Successfully');
    // }

    public function delete($task_id)
{
    // Fetch the task by its ID
    $data = Task::findOrFail($task_id);

    // Mark the task as inactive
    $data->status_active = 0; 
    $task->updated_at = now();
    // Save the changes
    $data->save();

    // Redirect back with a success message
    return redirect()->route('viewtask')->with('success', 'Data Deleted Successfully');
}



}
