<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::all() ; 
        $tasks  = Task::orderBy('created_at', 'desc')->paginate(10);
        return view('task.tasks')->with('tasks', $tasks) 
                                 ->with('users', $users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all()  ;
        $users = User::all() ;
        return view('task.create')->with('projects', $projects) 
                                  ->with('users', $users) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate( $request, [
            'task_title' => 'required',
            'task'       => 'required',
            'project_id' => 'required|numeric',
            'photos.*'   => 'sometimes|required|mimes:png,gif,jpeg,jpg,txt,pdf,doc',  // photos is an array: photos.*
            'duedate'    => 'required'
        ]) ;

        $task = Task::create([
            'project_id' => $request->project_id,
            'user_id'    => $request->user,
            'task_title' => $request->task_title,
            'task'       => $request->task,
            'priority'   => $request->priority,
            'duedate'    => $request->duedate
        ]);

        Session::flash('success', 'Task Created') ;
        return redirect()->route('task.show') ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id)  ; 
        $taskfiles = TaskFiles::where('task_id', '=', $id)->get() ;
        $projects = Project::all() ;
        $users = User::all() ;

        return view('task.edit')->with('task', $task)
                                ->with('projects', $projects ) 
                                ->with('users', $users);
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
        $update_task = Task::find($id);
        
        $this->validate( $request, [
            'task_title' => 'required',
            'task'       => 'required',
            'project_id' => 'required|numeric',
            'photos.*'   => 'sometimes|required|mimes:png,gif,jpeg,jpg,txt,pdf,doc' // photos is an array: photos.*
        ]) ;


        $update_task->task_title = $request->task_title; 
        $update_task->task       = $request->task;
        $update_task->user_id    = $request->user_id;
        $update_task->project_id = $request->project_id;
        $update_task->priority   = $request->priority;
        $update_task->completed  = $request->completed;
        $update_task->duedate    = $request->duedate;
        
        $update_task->save();
        
        Session::flash('success', 'Task was sucessfully edited');
        return redirect()->route('task.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_task = Task::find($id) ;
        $delete_task->delete() ;
        Session::flash('success', 'Task was deleted') ;
        return redirect()->back();
    }
}
