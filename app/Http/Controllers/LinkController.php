<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;


class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::orderBy('id',)->paginate(20); //'desc' ترتيب
        return response()->view('cms.Link.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
     
        $links = Link::all();
        return response()->view('cms.Link.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validator = validator($request->all(), [
                'icon' => 'required',

    
                
            ]);
    
            if (!$validator->fails()) {
    
                $links = new Link();
                
                $links->icon = $request->get('icon');
               
                $isSaved = $links->save();
                
                if ($isSaved) {
                    return response()->json(['icon' => 'success', 'title' => "Created is Successfuly"], 200);
    
                } else {
                    return response()->json(['icon' => 'error', 'title' => "Created is Failed"], 400);
    
                }
    
            } else {
                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
            }
    
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
        $links = Link::findOrFail($id);
        return response()->view('cms.link.show', compact('links'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $links = Link::findOrFail($id);
        return response()->view('cms.link.edit', compact('links'));
        
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
        {
            $validator = validator($request->all(), [
                
                'icon' => 'required',
                
            ]);
    
            if (!$validator->fails()) {
    
                $links =Link::findOrFail($id);           
                 
                $links->icon = $request->get('icon');
                
                $isUpdate = $links->save();
                return ['redirect' =>route('links.index')];
    
                if ($isUpdate) {
                    return response()->json(['icon' => 'success', 'title' => "Updated is Successfuly"], 200);
    
                } else {
                    return response()->json(['icon' => 'error', 'title' => "Updated is Failed"], 400);
    
                }
    
            } else {
                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
            }
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
        $links = Link::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
