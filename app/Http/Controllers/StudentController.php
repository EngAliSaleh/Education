<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::with('user')->orderBy('id' , 'desc')->paginate(10);


        $students = Student::orderBy('id' ,'desc');
        

        if ($request->get('student_email')) {
            $students = Student::where('student_email', 'like', '%' . $request->student_email . '%');
        }
        
        

        $students = $students->paginate(5);

        return response()->view('cms.Student.index' , compact('students'));
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cities = City::all();
        $countries = Country::all();
        return response()->view('cms.student.create', compact('cities', 'countries'));
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
            'password' => ['required', 'string', 'min:8', 'max:12'],
            'confirm_password' => 'required|same:password|min:8',
            'student_email' => 'required|email|unique:students,student_email',

        ], []);

        if (!$validator->fails()) {
            $students = new Student();
            $students->student_email = $request->get('student_email');
            $students->password = Hash::make($request->get('password'));
            $students->confirm_password = Hash::make($request->get('confirm_password'));
            $isSaved = $students->save();
            if ($isSaved) {
                $users = new User();
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/student', $imageName);
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

                $users->actor()->associate($students);
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
        $students = Student::findOrFail($id);
        return response()->view('cms.student.show', compact('cities', 'students', 'countries'));
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
        $students = Student::findOrFail($id);
        return response()->view('cms.student.edit', compact('cities', 'students', 'countries'));
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
            'password' => ['required', 'string', 'min:8', 'max:1000'],
            'confirm_password' => 'required|min:8',
            'student_email' => 'required',

        ], []);

        if (!$validator->fails()) {
            $students = Student::findOrFail($id);
            $students->student_email = $request->get('student_email');
            $students->password = Hash::make($request->get('password'));
            $students->confirm_password = Hash::make($request->get('confirm_password'));
            $isUpdate = $students->save();

            if ($isUpdate) {
                $users = $students->user;
                if (request()->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();
                    $image->move('storage/images/student', $imageName);
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
                return ['redirect' => route('students.index')];

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
    public function destroy($id)
    {
        $students = Student::destroy($id);

        return response()->json(['icon' => 'success', 'title' => 'Deleted is Succesfully'], 200);
    }
}
