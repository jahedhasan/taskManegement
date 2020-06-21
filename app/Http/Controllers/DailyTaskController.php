<?php

namespace App\Http\Controllers;

use App\DailyTask;
use Illuminate\Http\Request;

class DailyTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        $tasks = DailyTask::where('user_id', $user_id)->get();
        
        return view('daily_task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        return view('daily_task.create');
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
            'title' => 'required',
            'is_enable' => 'required',
        ]);
        $task            = new DailyTask();
        $task->title     = Request('title');   
        $task->is_enable = Request('is_enable'); 
        $task->user_id   =auth()->id();  
        $task->save();

        return redirect()->route('daily_task.index')->with('success','Task Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task =  DailyTask::find($id);


        return view('daily_task.edit', compact('task'));

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
        $this->validate( $request, [
            'title' => 'required',
            'is_enable' => 'required',
        ]);
        $task            = DailyTask::find($id);
        $task->title     = Request('title');   
        $task->is_enable = Request('is_enable'); 
      // $task->user_id   =auth()->id();  
        $task->save();

        return redirect()->route('daily_task.index')->with('success','Task Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DailyTask::find($id)->delete();

        return redirect()->back();
    }
}
