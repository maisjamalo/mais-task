<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function show(Request $request,$id)

    {
     $project=DB::table('projects')->where('id',$request->id)->get();
     return response()->json([
        'data'=>$project,
        'status' =>200,
        'msg' =>'Get project Successfully'
     ]);

    }
    public function store(Request $request)
    {
        $project= DB::table('projects')->insert([
         'title' =>$request->title,
         'description' =>$request->description,

        ]);
         return $project;
    }
    public function getAll()
    {
        $projects= DB::table('projects')->get();
        return response()->json([
            'data'=>$projects,
            'status' =>200,
            'msg' =>'Get All projects Successfully'
         ]);
    }
    public function update(Request $request)
    {
        $project=DB::table('projects')->where('id',$request->id)->update([
            'title' =>$request->title,
            'description' =>$request->description,
        ]);
        
        return response()->json([
           'data'=>$project,
           'status' =>200,
           'msg' =>'update project Successfully'
        ]); 
    }
    public function destroy(Request $request)
    {
        $project=DB::table('projects')->where('id',$request->id)->delete();
        return response()->json([
           'status' =>200,
           'msg' =>'Delete project Successfully'
        ]);
       }

}
