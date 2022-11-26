
@extends('website.headerFooter')
@section('title', 'About')
@section('styles')
@endsection
@section('content')

<header class="header">

   <a href="#" class="logo"> <i class="fas fa-lightbulb"></i> educa </a>

   <nav class="navbar">
      <a href="{{ route('home') }}" class="link">home</a>
      <a href="{{ route('about') }}" class="link">about</a>
      <a href="{{ route('courses') }}"class="link">courses</a>
      <a href="{{ route('contact') }} "class="link">contact</a>
   </nav>

   

</header>


{{-- <section class="heading-link">
   <h3>about us</h3>
   <p> <a href="home.html">home</a> / about </p>
</section> --}}

<!-- about section starts  -->

<section class="about">

   <div class="image">
      <img src="images/about-img.jpg" alt="">
   </div>

   <div class="content">
      <h3 class="about-title">we have best courses for you</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam hic magnam fugit exercitationem neque, quae laboriosam natus. Ut maxime assumenda facere ea quasi accusamus dolores delectus tempora animi, expedita iste.</p>
      <div class="icons-container">
         <div class="icons">
            <img src="images/about-icon-1.png" alt="">
            <h3>350+</h3>
            <span>courses</span>
         </div>
         <div class="icons">
            <img src="images/about-icon-2.png" alt="">
            <h3>1200+</h3>
            <span>students</span>
         </div>
         <div class="icons">
            <img src="images/about-icon-3.png" alt="">
            <h3>10+</h3>
            <span>awards</span>
         </div>
      </div>
   </div>

</section>

<!-- about section ends -->

<!-- teachers section starts  -->


<section class="teachers">

   <h1 class="heading">expert teachers</h1>

   <div class="swiper teachers-slider">

       <div class="swiper-wrapper">
         
             
          @foreach ($teachers as $teacher)
           <div class="swiper-slide slide " style="width: 368px; margin-right: 20px;">
               <div class="image">
                  <img src="{{ asset('storage/images/teacher/'.$teacher->user->image) }}" alt=""> 
                  <div class="share">
                     @foreach ($links as $link)

                     <a href="#" class="{{ $link->icon }}"></a>  
                       @endforeach
                   </div>
               </div>
               <div class="content">
                  <h3>{{ $teacher->user->first_name.$teacher->user->first_name }}</h3> 
                  <span>{{ $teacher->level }}</span>
               </div>
           </div>
           @endforeach
       </div>
   </div>

</section>

<!-- teachers section ends -->

<!-- students reviews section starts  -->

<section class="reviews">

   <h1 class="heading"> our students review </h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">
         @foreach ( $reviews as $review )
         <div class="swiper-slide slide "style="width: 368px; margin-right: 20px;">
            <p>{{ $review->reviewr_description }}</p>
            <img src="{{ asset('storage/images/review/'.$review->reviewr_image) }}" alt=""> 
            <h3>{{ $review->reviewr_name }}</h3>
            <div class="stars">
               <a class="{{ $review->reviewr_rating }}"></a>
               <a class="{{ $review->reviewr_rating }}"></a>
               <a class="{{ $review->reviewr_rating }}"></a>
               <a class="{{ $review->reviewr_rating }}"></a>
               
            </div>
         </div>
         @endforeach

         
         

      </div>

   </div>

</section>

<!-- students reviews section ends -->

@endsection
@section('scripts')
@endsection









