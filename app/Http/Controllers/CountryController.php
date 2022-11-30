<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::withCount('cities')->orderBy('id' , 'desc')->Paginate(5);
    



        $countries = Country::orderBy('id' ,'desc');
        

        if ($request->get('name')) {
            $countries = Country::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('code')) {
            $countries = Country::where('code', 'like', '%' . $request->code . '%');
        }
        if ($request->get('created_at')) {
            $countries = Country::where('created_at', 'like', '%' . $request->created_at . '%');
        }
        

        $countries = $countries->paginate(5);

        return response()->view('cms.Country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
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
            'name' => ['required', 'min:3', 'max:10000'],
            'code' => ['required','numeric', 'min:3', 'max:10000'],
        ]);

        if (!$validator->fails()) {
            $countries = new Country();
            $countries->name = $request->get('name');
            $countries->code = $request->get('code');
            $isSaved = $countries->save();
            // return ['redirect' =>route('countries.index')];
            
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);
            

            } else {
                return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);

            }

        } else {
            return response()->json(['icone' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
        $countries = Country::findOrFail($id);
        return response()->view('cms.Country.show', compact('countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return response()->view('cms.country.edit', compact('countries'));
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
        $validator = validator($request->all(),[
            'name' => ['required', 'min:5', 'max:10000'],
            'code' => ['required','numeric', 'min:3', 'max:10000'],
            
        ]);
        if(!$validator->fails()){
        $countries =Country::findOrFail($id);
        $countries->name= $request->get('name');
        $countries->code= $request->get('code');
        $isUpdate=$countries->save(); 
        return ['redirect' =>route('countries.index')];


        if ($isUpdate) { 
            return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);

        } else {
            return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);

        }

    } else {
        return response()->json(['icone' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
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
        $countries = Country::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
