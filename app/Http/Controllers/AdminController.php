<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use Spatie\Permission\Models\Role;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::with('user')->orderBy('id' , 'desc')->paginate(5);


        $admins = Admin::orderBy('id' ,'desc');
        

        if ($request->get('email')) {
            $admins = Admin::where('email', 'like', '%' . $request->email . '%');
        }
        
        

        $admins = $admins->paginate(5);

        return response()->view('cms.Admin.index' , compact('admins'));
    }
        

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create' , Admin::class);
        $roles =  Role::where('guard_name','admin')->get();
        $cities = City::all();
        $countries = Country::all();
        return response()->view('cms.Admin.create', compact('cities', 'countries','roles'));
       

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
            'email' => 'required|email|unique:admins,email,',
            'role_id' => ['required'],

        ], []);

        if (!$validator->fails()) {
            $admins = new Admin();
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));
            $admins->confirm_password = Hash::make($request->get('confirm_password'));
            $isSaved = $admins->save();
            if ($isSaved) {
                $users = new User();



                


                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);





                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
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

                $users->actor()->associate($admins);
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
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.show', compact('cities', 'admins', 'countries'));
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
        $admins = Admin::findOrFail($id);
        return response()->view('cms.admin.edit', compact('cities', 'admins', 'countries'));
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

        ], []);

        if (!$validator->fails()) {
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            // $admins->password = Hash::make($request->get('password'));
            $admins->confirm_password = Hash::make($request->get('confirm_password'));
            $isUpdate = $admins->save();

            if ($isUpdate) {
                $users = $admins->user;
                
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
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
                return ['redirect' => route('admins.index')];

                if ($isUpdate) {
                    return response()->json(['icon' => 'success', 'title' => 'Updated is successfyly'], 200);
                } else {
                    return response()->json(['icon' => 'error', 'title' => 'Updated is Failed'], 400);
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
    public function destroy(Admin $admin)
    {
       if($admin->id == Auth::id()){
      
         return redirect()->route('admins.index')
         ->withErrors(trans('operation is denied'));
        
       }
       else{
        $admin->user()->delete();
        $isDeleted = $admin->delete();
        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
       }

       
    }
}
