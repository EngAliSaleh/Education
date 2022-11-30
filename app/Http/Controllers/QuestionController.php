<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
  
        $questions = Question::orderBy('id',)->paginate(10); //'desc' ترتيب


        return response()->view('cms.Question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::all();
        return response()->view('cms.Question.create', compact('questions', ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = validator($request->all(), [
            'question' => 'required',
            'answer' => 'required',


        ]);

        if (!$validator->fails()) {
            $questions = new Question();
            $questions->question = $request->get('question');
            $questions->answer = $request->get('answer');
           
            $isSaved = $questions->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);

            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);

            }

        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
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
        //
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
        $questions = Question::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
