<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('id' );


        $permissions = Permission::orderBy('id' ,'desc');
        

        if ($request->get('guard_name')) {
            $permissions = Permission::where('guard_name', 'like', '%' . $request->guard_name . '%');
        }
        if ($request->get('name')) {
            $permissions = Permission::where('name', 'like', '%' . $request->name . '%');
        }
        
        

        $permissions = $permissions->orderBy('id' , 'desc')->paginate(5);


        return response()->view('cms.Spatie.permission.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Spatie.permission.create');
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
            'guard_name' => ['required', 'min:3', 'max:10000'],
            'name' => ['required', 'min:3', 'max:10000'],
        ]);

        if (!$validator->fails()) {
            $permissions = new Permission();
            $permissions->guard_name = $request->get('guard_name');
            $permissions->name = $request->get('name');
            $isSaved = $permissions->save();
            // return ['redirect' =>route('permissions.index')];
            
            if ($isSaved) {
                return response()->json(['icon' => 'success', 'title' => $isSaved ? "Created is Successfuly":"Created is Failed"],$isSaved ? 200:400);
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
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.Spatie.permission.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.Spatie.permission.edit', compact('permissions'));
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
            'guard_name' => ['required', 'min:3', 'max:10000'],
            'name' => ['required', 'min:3', 'max:10000'],
            
        ]);
        if(!$validator->fails()){
        $permissions =Permission::findOrFail($id);
        $permissions->guard_name= $request->get('guard_name');
        $permissions->name= $request->get('name');
        $isUpdate=$permissions->save(); 
        return ['redirect' =>route('permissions.index')];


        if ($isUpdate) { 
            return response()->json(['icon' => 'success', 'title' => $isUpdate ? "Created is Successfuly":"Created is Failed"],$isUpdate ? 200:400);

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
    public function destroy($id)
    {
        $permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}

