<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
   
    public function create(){
        return view('task');
    }
    public function store(Request $request){
       
        $request->validate([
            'title' => 'required|min:8',
            'description' => 'required|min:8',
            'priority' => 'nullable|string|in:Low,Medium,High',
            'status' => 'required|in:0,1',
        ]);
       
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->status = $request->status;
        $task->user_id = Auth::id();
        
        $task->save();
         
        return redirect()->route('task')->with('success', 'task created successfully.');
    }
}
