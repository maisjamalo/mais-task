<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)

    {
     $task=DB::table('tasks')->where('id',$request->id)->get();
     return response()->json([
        'data'=>$task,
        'status' =>200,
        'msg' =>'Get Task Successfully'
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task= DB::table('tasks')->insert([
         'title' =>$request->title,
         'status' =>$request->status,
        'description'=>$request->description,
         'user-id' =>$request->userid,
         'project-id' =>$request->projectid,


        ]);
         return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskMangModel  $taskMangModel
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $tasks= DB::table('tasks')->get();
        return response()->json([
            'data'=>$tasks,
            'status' =>200,
            'msg' =>'Get All Tasks Successfully'
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskMangModel  $taskMangModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskMangModel $taskMangModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskMangModel  $taskMangModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $task=DB::table('tasks')->where('id',$request->id)->update([
            'title' =>$request->title,
            'status' =>$request->status,
            'description'=>$request->description,
            'user-id' =>$request->userid,
            'project-id' =>$request->projectid,
        ]);
        
        return response()->json([
           'data'=>$task,
           'status' =>200,
           'msg' =>'update Task Successfully'
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskMangModel  $taskMangModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task=DB::table('tasks')->where('id',$request->id)->delete();
        return response()->json([
           'status' =>200,
           'msg' =>'Delete Task Successfully'
        ]);
       }
       public function changeStatusTask(Request $request)
    {
        $updatedtaskComment=Task::find($request->id);
        $updatedtaskComment->update([
            'status'=>$request->status]);

            return response()->json([
            'data'=>$updatedtaskComment,
            'msg'=>'updated taskComment successfully',
            'status'=>200
           ]);
    }
    }

