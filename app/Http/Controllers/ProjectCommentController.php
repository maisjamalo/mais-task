<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectComments;
use Illuminate\Support\Facades\DB;


class ProjectCommentController extends Controller
{
    public function store(Request $request)
    {
       $projectComment=ProjectComments::create([
        'comment'=>$request->comment,
        'user-id'=>$request->userid,
       ]);
       return $projectComment;
    }

    public function getALL(ProjectComments $projectComment)
    {
        $projectComment=ProjectComments::all();
         return response()->json([
            'data'=>$projectComment,
            'msg'=>'successfully',
            'status'=>200
           ]);
    }


    public function update(Request $request)
    {
        $updatedprojectComment=ProjectComments::find($request->id);

        $updatedprojectComment->update([
            'comment'=>$request->comment,
           'user-id'=>$request->userid]);

            return response()->json([
            'data'=>$updatedprojectComment,
            'msg'=>'updated projectComment successfully',
            'status'=>200
           ]);
    }

    public function destroy(Request $request)
    {
        $projectComment=ProjectComments::find($request->id);
        $projectComment->delete();
        return response()->json([
            'msg'=>'deleted successfully'
        ]);
    }
}
