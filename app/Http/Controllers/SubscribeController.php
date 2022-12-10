<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $subscribes = Subscribe::orderBy('id' ,'desc');
        

        if ($request->get('email')) {
            $subscribes = Subscribe::where('email', 'like', '%' . $request->email . '%');
        }
        
        

        $subscribes = $subscribes->paginate(100);

        return response()->view('cms.subscribe.index' , compact('subscribes'));
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
        $validator = validator($request->all(), [
            'email' => 'required',

        ]);

        if (!$validator->fails()) {
            $subscribes = new Subscribe();
            $subscribes->email = $request->get('email');
           
            $isSaved = $subscribes->save();
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Subscribe is Successfuly"], 200);

            } else {
                return response()->json(['icon' => 'error', 'title' => "Subscribe is Failed"], 400);

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
        $subscribes = Subscribe::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
