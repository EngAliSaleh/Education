<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Slider;
use App\Models\Subject;
use App\Models\Link;
use App\Models\Question;
use App\Models\Review;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
            $sliders = Slider::all();
            $subjects = Subject::all();
            $courses = Course::all();
            $links = Link::all();
            $subscribs = Link::all();




        return response()->view('website.home' ,compact('sliders','subjects','courses','links','subscribs'));
    }


    public function about()
    {
        
        $links = Link::all();
        $teachers = Teacher::all();
        $reviews = Review::all();
      

        return response()->view('website.about' ,compact('links','teachers','reviews' ));

    }


    public function courses()
    {
        $links = Link::all();
        $courses = Course::all();
        return response()->view('website.courses' ,compact('links','courses'));

    }
    public function contact()
    {
        $links = Link::all();
        $questions = Question::all();
        return response()->view('website.contact' ,compact('links','questions'));

    }

    
}
