<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use App\Models\Teacher;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserAuthController extends Controller
{
    public function ShowLogin($guard)
    {

        return response()->view('cms.auth.login', compact('guard'));
    }

    public function login(Request $request)
    {

        $validator = validator($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:3'
        ]);
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials)) {
                return response()->json(['icon' => 'success', 'title' => 'Log In Is Approved'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'Log In Is Denied'], 400);
            }
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }
    }


    public function logout(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'teacher';
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('dashboard.login', $guard);
    }

    //ُُEdite-Profile-DashBoard//
    public function editProfile()
    {
        if (auth('admin')->check()) {

        $admins = Admin::findOrFail(Auth::guard('admin')->id());

          $countries = Country::all();
            $cities = City::all();
            return response()->view('cms.auth.Admin-edit-profile', compact('countries', 'cities', 'admins'));
        }
        elseif (auth('teacher')->check()) {
        $teachers = Teacher::findOrFail(Auth::guard('teacher')->id());

        $countries = Country::all();
        $cities  = City::all();
        return response()->view('cms.teacher.edit', compact('cities', 'teachers', 'countries'));
            }
        

        // $teachers = Teacher::findOrFail(Auth::guard('teacher')->id());
        //   $countries = Country::all();
        //     $cities = City::all();
        //     return response()->view('cms.auth.Teacher-edit-profile', compact('countries', 'cities', 'teachers'));

        // if (auth('admin')->check()) {
        //     $roles = Role::where('guard_name', 'admin')->get();

        //     $countries = Country::all();
        //     $cities = City::all();
        //     $admins = Admin::findOrFail(Auth::id());

        //     return response()->view('cms.auth.Admin-edit-profile', compact('roles','countries', 'cities', 'admins'));
        // }

        // if (auth('teacher')->check()) {

        //     $roles = Role::where('guard_name', 'teacher')->get();
        //     $countries = Country::all();
        //     $cities = City::all();
        //     $teacher = Teacher::findOrFail(Auth::id());

        //     return response()->view('cms.auth.Teacher-edit-profile', compact('cities', 'teacher', 'roles','countries'));
        // }
    }

    public function editProfileTeacher()
    {
        $teachers = Teacher::findOrFail(Auth::guard('teacher')->id());

        $countries = Country::all();
        $cities  = City::all();
        return response()->view('cms.teacher.edit', compact('cities', 'teachers', 'countries'));
    }

    //Update-Profile-DashBoard//

    public function updateProfile(Request $request)
    {
        if (auth('admin')->check()) {
            $this->authorize('update', Admin::class);
            $validator = Validator($request->all(), [
                'first_name' => ['required', 'min:3', 'max:10000'],
                'last_name' => ['required', 'min:3', 'max:10000'],
                'gender' => ['required'],
                'status' => ['required'],
                'mobile' => ['required', 'min:9'],
                'date' => ['required'],
                'address' => ['required'],
                'city_id' => ['required'],
                'country_id' => ['required'],
                'email' => 'required',
            ]);

            if (!$validator->fails()) {
                $admins = Admin::findOrFail(Auth::guard('admin')->id);
                $admins->email = $request->get('email');
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/admin', $imageName);
                    $admins->image = $imageName;
                }
                $isUpdate = $admins->save();
                if ($isUpdate) {
                    $users = $admins->user;
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


        if (auth('teacher')->check()) {
            $this->authorize('update', Teacher::class);
            $validator = Validator($request->all(), [
                'first_name' => ['required', 'min:3', 'max:10000'],
                'last_name' => ['required', 'min:3', 'max:10000'],
                'gender' => ['required'],
                'status' => ['required'],
                'mobile' => ['required', 'min:9'],
                'date' => ['required'],
                'address' => ['required'],
                'city_id' => ['required'],
                'country_id' => ['required'],
                'level' => 'required',
                'email' => 'required',
            ]);

            if (!$validator->fails()) {
                $teachers = Teacher::findOrFail(Auth::guard('teacher')->id);
                $teachers->email = $request->get('email');
                $teachers->level = $request->get('level');
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/teacher', $imageName);
                    $teachers->image = $imageName;
                }
                $isUpdate = $teachers->save();
                if ($isUpdate) {
                    $users = $teachers->user;
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
                        return response()->json(['icon' => 'success', 'title' => 'Updated is successfyly'], 200);
                    } else {
                        return response()->json(['icon' => 'error', 'title' => 'Updated is Failed'], 400);
                    }
                }
            } else {
                return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
            }
        }
    }



    //EditPassword-Profile-DashBoard//


    public function editPassword()
    {

        return response()->view('cms.auth.change Password');
    }


    //Update-password-Profile-DashBoard//

    // public function updatePassword(Request $request)
    // {

    //     if (auth('admin')->check()) {

    //         $validator = validator(
    //             $request->all(),
    //             [
    //                 'password' => 'required|string|min:3|max:25',
    //                 'new_password' => 'required|string|min:3|max:25|confirmed',
    //                 'new_password_confirmation' => 'required|string|min:6|max:25',
    //             ],
    //             []
    //         );
    //         if (!$validator->fails()) {

    //             $admin = Admin::findOrFail(Auth::id());
    //             if (Hash::check($request->get('password'), $admin->password)) {
    //                 $admin->password = Hash::make($request->get('new_password'));
    //                 $isUpdate = $admin->update();


    //                 if ($isUpdate) {

    //                     return response()->json(['icon' => 'success', 'title' => 'Updated Password successfully'], 200);
    //                 } else {
    //                     return response()->json(['icon' => 'error', 'title' => 'failed To Update Password'], 400);
    //                 }
    //             } else {
    //                 return response()->json(['icon' => 'error', 'title' => 'Old Password Is Wrong'], 400);
    //             }
    //         } else {
    //             return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
    //         }
    //     }


    //     elseif (auth('teacher')->check()) {

    //         $validator = validator(
    //             $request->all(),
    //             [
    //                 // 'password' => 'required|string|min:6|max:25',
    //                 // 'new_password' => 'required|string|min:3|max:25|confirmed',
    //                 // 'new_password_confirmation' => 'required|string|min:3|max:25',
    //             ],
    //             []
    //         );
    //         if (!$validator->fails()) {

    //             $teacher = Teacher::findOrFail(Auth::id());
    //             if (Hash::check($request->get('password'), $teacher->password)) {
    //                 $teacher->password = Hash::make($request->get('new_password'));
    //                 $isUpdate = $teacher->update();
    //                 return ['redirect' => route('main')];

    //                 if ($isUpdate) {

    //                     return response()->json(['icon' => 'success', 'title' => 'Updated Password successfully'], 200);
    //                 } else {
    //                     return response()->json(['icon' => 'error', 'title' => 'failed To Update Password'], 400);
    //                 }
    //             } else {
    //                 return response()->json(['icon' => 'error', 'title' => 'Old Password Is Wrong'], 400);
    //             }
    //         } else {
    //             return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
    //         }
    //     }
    // }

    public function updatePassword(Request $request){
        $guard = auth('admin')->check() ? 'admin' : 'teacher';
        $validator = Validator($request->all(),[

            // 'current_password' => 'required|string',
            // 'new_password' => 'required|string|confirmed',
            // 'new_password_confirmation' => 'required|string'


                    'password' => 'required|string|min:3|max:25',
                    'new_password' => 'required|string|min:3|max:25|confirmed',
                    'new_password_confirmation' => 'required|string|min:6|max:25',
        ]);
        if(!$validator->fails()){
            $user = auth($guard)->user();
            $user->password = Hash::make($request->get('new_password'));
            $isSaved = $user->save();
            // return ['redirect' =>route('admins.index')];

            if($isSaved){
            return response()->json(['icon' => 'success' , 'title'=> 'تم تغيير كلمة المرور بنجاح'], 200 );


         } else {
            return response()->json(['icon' => 'error' , 'title' => 'فشلت عملية تغيير كلمة المرور'] , 400);
        }
    }
        else {
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()], 400);
        }
    }
}
