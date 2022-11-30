<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->authorize('viewAny' , Teacher::class);

        $teachers = Teacher::with('user')->orderBy('id')->paginate(10);


        $teachers = Teacher::orderBy('id' ,'desc');


        if ($request->get('email')) {
            $teachers = Teacher::where('email', 'like', '%' . $request->email . '%');
        }



        $teachers = $teachers->paginate(5);

        return response()->view('cms.teacher.index' , compact('teachers'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create' , Teacher::class);
        $roles =  Role::where('guard_name','teacher')->get();
        $cities = City::all();
        $countries = Country::all();
        return response()->view('cms.teacher.create', compact('cities', 'countries','roles'));


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
            'image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'first_name' => ['required', 'min:3', 'max:10000'],
            'last_name' => ['required', 'min:3', 'max:10000'],
            'gender' => ['required'],
            'status' => ['required'],
            'mobile' => ['required', 'min:9'],
            'date' => ['required'],
            'address' => ['required'],
            'city_id' => ['required'],
            'country_id' => ['required'],
            'password' => ['required', 'string', 'min:3', 'max:12'],
            'confirm_password' => 'required|same:password|min:3',
            'email' => 'required|email|unique:teachers,email,',
            'level' => 'required',
            'role_id'=>'required',

        ], []);

        if (!$validator->fails()) {
            $teachers = new Teacher();
            $teachers->email = $request->get('email');
            $teachers->password = Hash::make($request->get('password'));
            $teachers->confirm_password = Hash::make($request->get('confirm_password'));
            $teachers->level = $request->get('level');
            $isSaved = $teachers->save();
            if ($isSaved) {
                $users = new User();

                $roles = Role::findOrFail($request->get('role_id'));
                $teachers->assignRole($roles->name);



                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/teacher', $imageName);
                    $users->image = $imageName;
                }
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->mobile = $request->get('mobile');
                $users->date = $request->get('date');
                $users->address = $request->get('address');
                $users->city_id = $request->get('city_id');
                $users->country_id = $request->get('country_id');

                $users->actor()->associate($teachers);
                $isSaved = $users->save();

                if ($isSaved) {
                    return response()->json(['icon' => 'success', 'title' => 'Created is successfyly'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Created is Failed'], 400);
                }
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
        $countries = Country::all();
        $cities  = City::all();
        $teachers = Teacher::findOrFail($id);
        return response()->view('cms.teacher.show', compact('cities', 'teachers', 'countries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::all();
        $cities  = City::all();
        $teachers = Teacher::findOrFail($id);
        return response()->view('cms.teacher.edit', compact('cities', 'teachers', 'countries'));
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
            // 'image' => ['required', 'max:2048', 'mimes:png,jpg,jpeg,pdf'],
            'first_name' => ['required', 'min:3', 'max:10000'],
            'last_name' => ['required', 'min:3', 'max:10000'],
            'gender' => ['required'],
            'status' => ['required'],
            'mobile' => ['required', 'min:9'],
            'date' => ['required'],
            'address' => ['required'],
            'city_id' => ['required'],
            'country_id' => ['required'],
            // 'password' => ['required', 'string', 'min:3', 'max:1000'],
            // 'confirm_password' => 'required|same:password|min:3',
            'email' => 'required',
            'level' => 'required',

        ], []);

        if (!$validator->fails()) {
            $teachers = Teacher::findOrFail($id);
            $teachers->email = $request->get('email');
            // $teachers->password = Hash::make($request->get('password'));
            // $teachers->confirm_password = Hash::make($request->get('confirm_password'));
            $teachers->level = $request->get('level');
            $isUpdate = $teachers->save();
            if ($isUpdate) {
                $users = $teachers->user;
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/teacher', $imageName);
                    $users->image = $imageName;
                }
                $users->first_name = $request->get('first_name');
                $users->last_name = $request->get('last_name');
                $users->gender = $request->get('gender');
                $users->status = $request->get('status');
                $users->mobile = $request->get('mobile');
                $users->date = $request->get('date');
                $users->address = $request->get('address');
                $users->city_id = $request->get('city_id');
                $users->country_id = $request->get('country_id');


                $isUpdate = $users->save();
                return ['redirect' => route('teachers.index')];

                if ($isUpdate) {
                    return response()->json(['icon' => 'success', 'title' => 'Created is successfyly'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Created is Failed'], 400);
                }
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
    public function destroy(Teacher $teacher)
    {
        if($teacher->id == Auth::id()){
         return redirect()->route('teachers.index')
         ->withErrors(trans('operation is denied'));
        }
        else{
         $teacher->user()->delete();
         $isDeleted = $teacher->delete();
         return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
        }


     }
}
