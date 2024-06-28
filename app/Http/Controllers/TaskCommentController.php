<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskComments;
use Illuminate\Support\Facades\DB;




class TaskCommentController extends Controller
{
    public function store(Request $request)
    {
       $taskComment=TaskComments::create([
        'comment'=>$request->comment,
        'user-id'=>$request->userid,
       ]);
       return $taskComment;
    }

    public function getALL(TaskComments $taskComment)
    {
        $taskComment=TaskComments::all();
         return response()->json([
            'data'=>$taskComment,
            'msg'=>'successfully',
            'status'=>200
           ]);
    }
    public function update(Request $request)
    {
        $updatedtaskComment=TaskComments::find($request->id);

        $updatedtaskComment->update([
            'comment'=>$request->comment,
            'user-id'=>$request->userid]);

            return response()->json([
            'data'=>$updatedtaskComment,
            'msg'=>'updated taskComment successfully',
            'status'=>200
           ]);
    }


    public function destroy(Request $request)
    {
        $taskComment=TaskComments::find($request->id);
        $taskComment->delete();
        return response()->json([
            'msg'=>'deleted successfully'
        ]);
    }
}
