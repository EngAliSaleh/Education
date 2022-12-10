<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::withCount('subject')->orderBy('id' , 'desc')->simplePaginate(30);


        $courses = Course::orderBy('id' ,'desc');
        

        if ($request->get('course_name')) {
            $courses = Course::where('course_name', 'like', '%' . $request->course_name . '%');
        }
        if ($request->get('course_title')) {
            $courses = Course::where('course_title', 'like', '%' . $request->course_title . '%');
        }
        if ($request->get('created_at')) {
            $courses = Course::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        
        

        $courses = $courses->paginate(5);

        return response()->view('cms.Course.index' , compact('courses'));
    }
    ////////////
    public function create()
    {

        $courses = Course::all();
        $subjects = Subject::all();
        return response()->view('cms.Course.create', compact('courses', 'subjects'));
    }

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'course_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'course_name' => ['required', 'min:4', 'max:255'],
            'course_title' => ['required', 'min:3', 'max:255'],
            'course_description' => ['required', 'min:0', 'max:20000'],
            'course_module' => ['required',  'min:0', 'max:10000'],
            'course_hour' => ['required', 'min:0', 'max:10000'],

            
        ]);

        if (!$validator->fails()) {

            $courses = new Course();
            if (request()->hasFile('course_image')) {
                $image = $request->file('course_image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/course', $imageName);
                $courses->course_image = $imageName;
            }
            $courses->course_name = $request->get('course_name');
            $courses->course_title = $request->get('course_title');
            $courses->course_description = $request->get('course_description');
            $courses->course_module = $request->get('course_title');
            $courses->course_hour = $request->get('course_hour');
            $courses->subject_id = $request->get('subject_id');
            $isSaved = $courses->save();
            
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);

            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);

            }

        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

    }
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            // 'course_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'course_name' => ['required', 'min:4', 'max:255'],
            'course_title' => ['required', 'min:0', 'max:255'],
            'course_description' => ['required', 'min:0', 'max:20000'],
            'course_module' => ['required', 'min:0', 'max:255'],
            'course_hour' => ['required', 'min:0', 'max:255'],
            
        ]);

        if (!$validator->fails()) {

            $courses =Course::findOrFail($id);           
             if (request()->hasFile('course_image')) {
                $image = $request->file('course_image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/course', $imageName);
                $courses->course_image = $imageName;
            }
            $courses->course_name = $request->get('course_name');
            $courses->course_title = $request->get('course_title');
            $courses->course_description = $request->get('course_description');
            $courses->course_module = $request->get('course_module');
            $courses->course_hour = $request->get('course_hour');
            $isUpdate = $courses->save();
            return ['redirect' =>route('courses.index')];

            if ($isUpdate) {
                return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);

            } else {
                return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);

            }

        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }
    ////////////////
    public function edit($id)
    {   $subjects = Subject::all();
        $courses = Course::findOrFail($id);
        return response()->view('cms.Course.edit', compact('courses','subjects'));
    }
        /////////////////////////

    
   

    public function show($id)
    {
        $subjects = Subject::all();
        $courses = Course::findOrFail($id);
        return response()->view('cms.Course.show', compact('courses','subjects'));
    }
    ///////////////
    public function destroy($id)
    {
        $courses = Course::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }


}
