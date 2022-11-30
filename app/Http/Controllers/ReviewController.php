<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $reviews = Review::orderBy('id',)->paginate(10); //'desc' ترتيب

        return response()->view('cms.review.index', compact('reviews'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $reviews = Review::all();
        return response()->view('cms.review.create', compact('reviews'));
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
            'reviewr_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'reviewr_name' => ['required', 'min:0', 'max:255'],
            'reviewr_description' => ['required', 'min:4', 'max:255'],
            'reviewr_rating' => 'required',
            
    
            
        ]);
    
        if (!$validator->fails()) {
    
            $reviews = new Review();
            if (request()->hasFile('reviewr_image')) {
                $image = $request->file('reviewr_image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/review', $imageName);
                $reviews->reviewr_image = $imageName;
            }
            $reviews->reviewr_name = $request->get('reviewr_name');
            $reviews->reviewr_description = $request->get('reviewr_description');
            $reviews->reviewr_rating = $request->get('reviewr_rating');
            
            $isSaved = $reviews->save();
            
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
        $reviews = Review::findOrFail($id);
        return response()->view('cms.review.show', compact('reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reviews = Review::findOrFail($id);
        return response()->view('cms.review.edit', compact('reviews'));
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
        $validator = validator($request->all(), [
            // 'reviewr_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'reviewr_name' => ['required', 'min:0', 'max:255'],
            'reviewr_description' => ['required', 'min:4', 'max:255'],
            'reviewr_rating' => 'required'
            
    
            
        ]);
    
        if (!$validator->fails()) {
    
            $reviews =Review::findOrFail($id); 
            if (request()->hasFile('reviewr_image')) {
                $image = $request->file('reviewr_image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/review', $imageName);
                $reviews->reviewr_image = $imageName;
            }
            $reviews->reviewr_name = $request->get('reviewr_name');
            $reviews->reviewr_description = $request->get('reviewr_description');
            $reviews->reviewr_rating = $request->get('reviewr_rating');
           
            $isUpdate = $reviews->save();
            return ['redirect' =>route('reviews.index')];

            
            if ($isUpdate) {
                return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);
    
            } else {
                return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);
    
            }
    
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reviews = Review::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
