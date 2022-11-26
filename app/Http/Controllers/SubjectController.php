<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = Subject::withCount('courses')->orderBy('id' , 'desc')->simplePaginate(7);


        $subjects = Subject::orderBy('id' ,'desc');
        

        if ($request->get('subject_name')) {
            $subjects = Subject::where('subject_name', 'like', '%' . $request->subject_name . '%');
        }
        if ($request->get('created_at')) {
            $subjects = Subject::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        
        

        $subjects = $subjects->paginate(5);

        return response()->view('cms.Subject.index' , compact('subjects'));
    }
    
    
    ////////////////
    public function show($id)
    {
        $subjects = Subject::findOrFail($id);
        return response()->view('cms.Subject.show', compact('subjects'));
    }

    //////////////////
    public function create()
    {
        return response()->view('cms.Subject.create');
    }
    ////////////////

    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'subject_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'subject_name' => ['required', 'min:3', 'max:10000'],
            'subject_module' => ['required',  'min:0', 'max:10000'],

        ]);

        if (!$validator->fails()) {
            $subjects = new Subject();
            if (request()->hasFile('subject_image')) {
                $image = $request->file('subject_image');
                $imageName = time() . 'subject_image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/subject', $imageName);
                $subjects->subject_image = $imageName;
            }

                $subjects->subject_name = $request->get('subject_name');
                $subjects->subject_module = $request->get('subject_module');
                $isSaved = $subjects->save();

                if ($isSaved) {
                    return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);
                }
            } else {
                return response()->json(['icone' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
            }
        }
    
    //////////////////
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(), [
            // 'subject_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'subject_name' => ['required', 'min:3', 'max:10000'],
            'subject_module' => ['required',  'min:0', 'max:10000'],

        ]);

        if (!$validator->fails()) {

            $subjects = Subject::findOrFail($id);

            if (request()->hasFile('subject_image')) {
                $image = $request->file('subject_image');
                $imageName = time() . 'subject_image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/subject', $imageName);
                $subjects->subject_image = $imageName;
            }

                $subjects->subject_name = $request->get('subject_name');
                $subjects->subject_module = $request->get('subject_module');
                $isUpdate = $subjects->save();
            return ['redirect' =>route('subjects.index')];

            if ($isUpdate) {
                    return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);
                }
            } else {
                return response()->json(['icone' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
            }
        }
    
    ////////////////////////////////
    public function edit($id)
    {
        $subjects = Subject::findOrFail($id);
        return response()->view('cms.Subject.edit', compact('subjects'));
    }
    ////////////////
    public function destroy($id)
    {
        $subjects = Subject::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
