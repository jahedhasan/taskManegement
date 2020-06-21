<?php

namespace App\Http\Controllers;

use App\DailyTask;
use App\TaskManagement;
use Illuminate\Http\Request;

class TaskManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today_date = date("Y-m-d");
        $task_management = TaskManagement::whereDate('task_date', $today_date)->first();
        if ( $task_management ) {
            $task_list = json_decode( $task_management->task_list, true );
        } else {
            $task_list = [];
        }

        $enable_tasks = DailyTask::where( 'user_id', auth()->id() )
                                    ->where('is_enable' , true)
                                    ->get();
        
        return view('task_management.index', compact('enable_tasks', 'task_list' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $enable_tasks = DailyTask::where( 'user_id', auth()->id() )
                                    ->where('is_enable' , true)
                                    ->get();

        $today_date = date("Y-m-d");

        $task_management = TaskManagement::whereDate ('task_date', $today_date)->first();

        if ( $task_management ) {
            $task_list = json_decode( $task_management->task_list, true );
        } else {
            $task_list = [];
            foreach ($enable_tasks as $task) {
                $task_list[ $task->slug ] = [
                    'title' => $task->title ,
                    'is_done' => 0,
                    'total_time' => '',
                    'other_data' => '',
                ];
            }

        }


        // $title = request('title');
        $slug = request('slug');
        // $is_done = request('slug');
        // $total_time = request('slug');
        // $other_data = request('slug');

        $task_list[ $slug ] = [
            'title' => request('title'),
            'is_done' => request('is_done'),
            'total_time' => request('total_time'),
            'other_data' => request('other_data'),
        ];

        $data = [
            'task_date' => $today_date,
            'task_list' => json_encode( $task_list ),
            'user_id' => auth()->id(),
        ];

        if ( $task_management ) {
            $task_management->update( $data );
        } else {
            $ts = TaskManagement::create( $data );
            $ts->save();
        }

        return redirect()->back();


        return redirect()->routes('task_management.index')->with('success', 'Successfully Input');

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function view(){

        $task_views = TaskManagement::where('user_id', auth()->id() )->paginate('10');
        
        return view('task_management.view', compact('task_views') );
    }
    public function task_date(){
        return view('task_management.edit');
    }
    public function task_edit(Request $request){
        $this->validate( $request, [
            'date' => 'required'
        ]);

        $date = request('date');
        $task_data = TaskManagement::where('task_date' , $date)
                                    ->where('user_id',auth()->id() )
                                  ->first();
        if ($task_data) {
            $task_lists = json_decode($task_data->task_list, true);
        }else{
            $task_lists = [];
        }
        
        //return $task_lists;
        
        return view('task_management.edit' , compact('task_lists'));

    }

}
