@extends('website.headerFooter')
@section('title', 'EducationWebSite')
@section('styles')
@endsection
@section('content')

    <!-- header section starts  -->

    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-lightbulb"></i> educa<span style="color:#0eb582; ">tion</span> </a>





        <nav class="navbar">
            <div id="close-navbar" class="fas fa-times"></div>
            <a href="{{ route('home') }}" class="link">Home</a>
            <a href="{{ route('about') }}" class="link">About</a>
            <a href="{{ route('courses') }}"class="link">Courses</a>
            <a href="{{ route('contact') }} "class="link">Contact</a>
        </nav>

        <div class="icons">
            <div id="account-btn" class="fas fa-user"></div>
            <div id="menu-btn" class="fas fa-bars"></div>


        </div>

    </header>

    <!-- account form section starts  -->

    <div class="account-form ">

        <div id="close-form" class="fas fa-times"></div>

        <div class="buttons">
            <span class="btn active login-btn">login</span>
            <span class="btn register-btn">register</span>
        </div>

        <form class="login-form active" action="">
            <h3>login now</h3>
            <input type="email" placeholder="enter your email" class="box">
            <input type="password" placeholder="enter your password" class="box">
            <div class="flex">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
                <a href="#">forgot password?</a>

                <span>
                    <a class="admin" href="{{ route('dashboard.login', 'admin') }}">Education-Admin</a>
                    <a class="admin" href="{{ route('dashboard.login', 'teacher') }}">Education-Teacher</a>
                </span>

            </div>
            <input type="submit" value="login now" class="btn">
        </form>

        <form class="register-form" action="">
            <h3>register now</h3>
            <input id="student_email" name="student_email" type="email" placeholder="enter your email" class="box">
            <input type="password" id="password" name="password" placeholder="enter your password" class="box">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="confirm your password"
                class="box">
            <button tybe="button" class="btn">REGISTER</button>
            {{-- onclick="performStoreStudent()" --}}
        </form>

    </div>

    <!-- account form section ends -->

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home">

        <div class="swiper home-slider">

            <div class="swiper-wrapper">

               
                @foreach ($sliders as $slider)
                    <section class="swiper-slide slide" @if ($loop->last) active @endif
                        style="background-image: url('{{ url('storage/images/slider/' . $slider->slider_image) }}')">
                        <div class="content">
                            <h3>{{ $slider->slider_title }}</h3>
                            <p>{{ $slider->slider_description }}</p>
                            <a href="#" class="btn" id="getstart">get started</a>
                        </div>
                    </section>
                @endforeach

            </div>



        </div>

    </section>

    

    <section class="subjects">

        <h1 class="heading">our popular subjects</h1>

        <div class="box-container" >
            @foreach ($subjects as $subject)
                <div class="box">
                    <img src="{{ asset('storage/images/subject/' . $subject->subject_image) }}" style="">
                    <h3>{{ $subject->subject_name }}</h3>
                    <p>{{ $subject->subject_module }}</p>
                </div>
            @endforeach


        </div>

    </section>


    <section class="home-courses">

        <h1 class="heading"> our popular courses </h1>

        <div class="swiper home-courses-slider">



            <div class="swiper-wrapper" >
                @foreach ($courses as $course)
                    <div class="swiper-slide slide" >
                        <div class="image">
                            <img src="{{ asset('storage/images/course/' . $course->course_image) }}" alt="">

                        </div>
                        <div class="content">
                            <h3>{{ $course->course_name }}</h3>

                            <a href="{{ route('courses') }}" class="btn">read more</a>
                        </div>
                    </div>
                @endforeach

            </div>



        </div>

    </section>

    












@endsection

@section('scripts')
{{-- <script>
   function performStoreStudent() {
   let formData = new FormData();
   
   formData.append('student_email', document.getElementById('student_email').value);
   formData.append('password', document.getElementById('password').value);
   formData.append('confirm_password', document.getElementById('confirm_password').value);
   store('/cms/admin/students', formData);
   }
</script> --}}
@endsection
