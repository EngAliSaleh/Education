<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
        $cities = City::with('country')->orderBy('id' , 'desc')->paginate(10);


        $cities = City::orderBy('id' ,'desc');
        

        if ($request->get('name')) {
            $cities = city::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('street')) {
            $cities = city::where('street', 'like', '%' . $request->street . '%');
        }
        if ($request->get('created_at')) {
            $cities = city::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        

        $cities = $cities->paginate(5);

        return response()->view('cms.city.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $countries = Country::all();
        return response()->view('cms.city.create',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $cities = City::findOrFail($id);
        return response()->view('cms.city.edit', compact('cities','countries'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => ['required', 'min:3', 'max:255'],
            'street' => ['required', 'min:3', 'max:255'],
            'country_id' => ['required'],
        ]);

        if (!$validator->fails()) {
            $cities = new City();
            $cities->name = $request->get('name');
            $cities->street = $request->get('street');
            $cities->country_id = $request->get('country_id');
            $isSaved = $cities->save();
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
    public function destroy($id)
    {
        $cities = City::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
    public function show($id)
    {
        $cities = City::findOrFail($id);
        return response()->view('cms.City.show', compact('cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            'name' => ['required', 'min:3', 'max:10000'],
            'street' => ['required', 'min:3', 'max:10000'],
            
        ]);
        if(!$validator->fails()){
        $cities =City::findOrFail($id);
        $cities->name= $request->get('name');
        $cities->street= $request->get('street');
        $isUpdate=$cities->save(); 
        return ['redirect' =>route('cities.index')];


        if ($isUpdate) {
            return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);

        } else {
            return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);

        }

    } 
    else {
        return response()->json(['icone' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
    }

    }

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */

}