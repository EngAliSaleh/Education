<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id')->paginate(10);
        return response()->view('cms.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $sliders = Slider::all();
        return response()->view('cms.slider.create', compact('sliders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    $validator = validator($request->all(), [
        'slider_image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
        'slider_title' => ['required', 'min:4', 'max:255'],
        'slider_description' => ['required', 'min:3', 'max:255'],
        

        
    ]);

    if (!$validator->fails()) {

        $sliders = new Slider();
        if (request()->hasFile('slider_image')) {
            $image = $request->file('slider_image');
            $imageName = time() . 'image.' . $image->getClientOriginalExtension();
            $image->move('storage/images/slider', $imageName);
            $sliders->slider_image = $imageName;
        }
        $sliders->slider_title = $request->get('slider_title');
        $sliders->slider_description = $request->get('slider_description');
        
        $isSaved = $sliders->save();
        
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
        
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.show', compact('sliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $sliders = Slider::findOrFail($id);
        return response()->view('cms.slider.edit', compact('sliders'));
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
            // 'slider' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'slider_title' => ['required', 'min:4', 'max:255'],
            'slider_description' => ['required', 'min:3', 'max:255'],
            
    
            
        ]);
    
        if (!$validator->fails()) {
    
            $sliders =Slider::findOrFail($id); 
            if (request()->hasFile('slider_image')) {
                $image = $request->file('slider_image');
                $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                $image->move('storage/images/slider', $imageName);
                $sliders->slider_image = $imageName;
            }
            $sliders->slider_title = $request->get('slider_title');
            $sliders->slider_description = $request->get('slider_description');
            
            $isUpdate = $sliders->save();
            return ['redirect' =>route('sliders.index')];

            
            if ($isUpdate) {
                return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);
    
            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);
    
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
        $sliders = Slider::destroy($id);

        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
