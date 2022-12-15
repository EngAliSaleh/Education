<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $roles = Role::orderBy('id' ,'desc');
        

        if ($request->get('guard_name')) {
            $roles = Role::where('guard_name', 'like', '%' . $request->guard_name . '%');
        }
        if ($request->get('name')) {
            $roles = Role::where('name', 'like', '%' . $request->name . '%');
        }
        
        

        $roles = $roles->paginate(5);

        // return response()->view('cms.Spatie.role.index' , compact('roles'));
        $roles = Role::withCount('permissions')->orderBy('id' , 'desc')->Paginate(5);
        return response()->view('cms.Spatie.role.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.Spatie.role.create');
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
            $roles = new Role();
            $roles->guard_name = $request->get('guard_name');
            $roles->name = $request->get('name');
            $isSaved = $roles->save();
            // return ['redirect' =>route('roles.index')];
            
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
        $roles = Role::findOrFail($id);
        return response()->view('cms.Spatie.role.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::findOrFail($id);
        return response()->view('cms.Spatie.role.edit', compact('roles'));
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
        $roles =Role::findOrFail($id);
        $roles->guard_name= $request->get('guard_name');
        $roles->name= $request->get('name');
        $isUpdate=$roles->save(); 
        return ['redirect' =>route('roles.index')];


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
        $roles = Role::destroy($id);
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
