<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task; //追加

class TopController extends Controller
{
    public function index()
    {
        // $tasks = Task::all();
        
        // return view('welcome', [
        //     'tasks' => $tasks,
        // ]);
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            
            return view('tasks.index', $data);
        } else {
            return view('welcome');
        }
        
    }
    
    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', [
            'task' => $task,
        ]);
    }
}
