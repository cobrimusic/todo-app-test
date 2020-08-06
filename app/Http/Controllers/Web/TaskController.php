<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Task;
use App\TaskStatus;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = DB::table('tasks')->leftJoin('tasks_status', 'tasks.id', '=', 'tasks_status.task_id')->where('tasks.deleted', 0)->get();

        return view("tasks")->with([
            "tasks" => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("task_create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = array(
            'title'    => 'required',
            'short_description' => 'required'   
        );

        $validator = Validator::make($request->all(), $rules);
        // process the login
        if ($validator->fails()) {
            return redirect()->route('create_task')->withErrors($validator)->withInput();
        } else {
            // store
            $data = $request->all();
            $task = Task::create($data);
            $data = ['task_id' => $task->id];
            $task->taskstatus()->create($data);
            
            // redirect
            $request->session()->flash('success', 'Task Created');
            return redirect()->route('list');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $task = TaskStatus::find($id);
        $task->status_task = 'finished';

        $task->save();

        // redirect
        $request->session()->flash('success', 'Task Updated');

        return redirect()->route('list');
        
    }


    public function delete(Request $request, $id)
    {
        //
        $task = Task::find($id);
        $task->deleted = 1;
        $task->save();

        // redirect
        $request->session()->flash('success', 'Task Deleted');
        return redirect()->route('list');
    }
}
