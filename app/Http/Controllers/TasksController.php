<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task; //追加

class TasksController extends Controller
{

    public function index()
    {
        // $tasks = Task::all();
        
        // return view('tasks.index', [
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

    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,  
        ]);
    }

    public function store(Request $request)
    {
        //バリデーションの記載
        $this->validate($request, [
            'status' => 'required|max:10', //追加
            'content' => 'required|max:191',
        ]);
        
        $task = new Task;
        $task->status = $request->status; //追加
        $task->user_id = $request->user()->id; //追加
        $task->content = $request->content;
        $task->save();
        
        return redirect('/tasks/list');
    }

    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        
        return view('tasks.edit', [
            'task' => $task,    
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10', //追加
            'content' => 'required|max:191',    
        ]);
        
        $task = Task::find($id);
        $task->status = $request->status; //追加
        $task->user_id = $request->user()->id; //追加
        $task->content = $request->content;
        
        // $task->save();
        
        if (\Auth::id() === $task->user_id) {
            $task->save();
        }
        
        return redirect('/tasks/list');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }
        
        // $task->delete();
        
        return redirect('/tasks/list');
    }
}
