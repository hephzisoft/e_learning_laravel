<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function courseList()
    {
        // returning all the course list
        $result   =  Course::select('name','thumbnail','lesson_num', 'price', 'id')->get();
        return response()->json([
            'code' => 200,
            'msg' => 'My course list is here',
            'data' => $result
        ], 200);
    }
    public function courseDetail(Request $request){
        $id  = $request->id;
        try{
            $result = Course::where('id', '=', $id)->select('name', 'thumbnail', 'lesson_num', 'user_token', 'description', 'video_length', 'price', 'id', )->first();


            return response()->json([
                'code' => 200,
                'msg' => 'My course details is here',
                'data' => $result
            ], 200);


        } catch (\Throwable $e) {
  return response()->json([
                'code' => 500,
                'msg' => 'Server internal error',
                'data' => $result
            ], 50);
        }     

       

    }
}
