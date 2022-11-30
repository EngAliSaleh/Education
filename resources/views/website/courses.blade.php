
   @extends('website.headerFooter')
   @section('title', 'Courses')
   @section('styles')
   @endsection
   @section('content')
<!-- header section starts  -->

<header class="header">

   <a href="#" class="logo"> <i class="fas fa-lightbulb"></i> educa </a>

   <nav class="navbar">
      <div id="close-navbar" class="fas fa-times"></div>
      <a href="{{ route('home') }}" class="link">home</a>
      <a href="{{ route('about') }}" class="link">about</a>
      <a href="{{ route('courses') }}"class="link">courses</a>
      <a href="{{ route('contact') }} "class="link">contact</a>
   </nav>

</header>


<!-- header section ends -->

{{-- <section class="heading-link">
   <h3>our courses</h3>
   <p> <a href="home.html">home</a> / courses </p>
</section> --}}

<section class="courses">

  
   
   <div class="box-container">
     

      @foreach ($courses as $course )
      <div class="box ">
         <div>
            <div class="image">
               <img src="{{ asset('storage/images/course/'.$course->course_image) }}" alt="">
               <h3>{{ $course->course_name }}</h3>
            </div>
            <div class="content">
               <h3>{{ $course->course_title }}</h3>
               <p style="height:200px;">{{ $course->course_description }}</p>
    
               <div class="icons">
                  <span> <i class="fas fa-book"></i> 12 modules </span>
                  <span> <i class="fas fa-clock"></i> 6 hours </span>
               </div>
            </div>
         </div>
      
      </div>
      @endforeach

    

      <div class="box hide abc">
         <div class="image">
            <img src="images/course-2-9.jpg" alt="">
            <h3>dancing</h3>
         </div>
         <div class="content">
            <h3>choose what's best for you!</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque, odit!</p>
            <a href="#" class="btn">read more</a>
            <div class="icons">
               <span> <i class="fas fa-book"></i> 12 modules </span>
               <span> <i class="fas fa-clock"></i> 6 hours </span>
            </div>
         </div>
      </div>

   </div>
   


   <div class="load-more"> <div class="btn">load more</div> </div>

</section>




@endsection
@section('scripts')

@endsection










