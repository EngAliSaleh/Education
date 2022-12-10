
 @extends('website.headerFooter')
 @section('title', 'Contact')
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



<!-- contact section starts  -->

<section class="contact">

   <h1 class="heading"> get in touch </h1>

   <div class="icons-container">

      <div class="icons">
         <i class="fas fa-clock"></i>
         <h3>opening hours :</h3>
         <p>00:07am to 00:06pm</p>
      </div>

      <div class="icons">
         <i class="fas fa-phone"></i>
         <h3>phone :</h3>
         <p>+123-456-7890</p>
         <p>+111-222-3333</p>
      </div>

      <div class="icons">
         <i class="fas fa-envelope"></i>
         <h3> email : </h3>
         <p>shaikhanas@gmail.com</p>
         <p>anasbhai@gmail.com</p>
      </div>

      <div class="icons">
         <i class="fas fa-map"></i>
         <h3>address :</h3>
         <p>mumbai, india - 400104</p>
      </div>

   </div>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.png" alt="">
      </div>

      <form>
         <h3>send us a message</h3>
         <input type="text" placeholder="name" class="box" name="contact_name" id="contact_name">
         <input type="email" placeholder="email" class="box" name="contact_email" id="contact_email">
         <input type="number" placeholder="phone" class="box" name="contact_phone" id="contact_phone">
         <textarea class="box" placeholder="message" name="contact_message" id="contact_message" cols="30" rows="10"></textarea>


         <button type="button" onclick="performStoreContact()"  class="btn">Send Message</button>

      </form>

   </div>

</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq">

   <h1 class="heading">frequently asked questions</h1>

   <div class="accordion-container">
      @foreach ($questions as $question )
         
     
      <div class="accordion ">
         <div class="accordion-heading">
            <h3>{{ $question->question }}</h3>
            <i class="fas fa-angle-down"></i>
         </div>
         <p class="accordion-content">
            {{ $question->answer }}
         </p>
      </div>
      @endforeach

      

   </div>

</section>

<!-- faq section ends -->

<!-- logo slider starts  -->

<section class="logo-container">
   <div class="swiper logo-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide"> <img src="images/partner-logo-1.png" alt=""> </div>
         <div class="swiper-slide"> <img src="images/partner-logo-2.png" alt=""> </div>
         <div class="swiper-slide"> <img src="images/partner-logo-3.png" alt=""> </div>
         <div class="swiper-slide"> <img src="images/partner-logo-4.png" alt=""> </div>
         <div class="swiper-slide"> <img src="images/partner-logo-5.png" alt=""> </div>
      </div>
   </div>
</section>

<!-- logo slider ends -->

<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('cms/js/crud.js') }}"></script>
@endsection
@section('scripts')
<script>
        
   function performStoreContact() {
       let formData = new FormData();
       formData.append('contact_name', document.getElementById('contact_name').value);
       formData.append('contact_email', document.getElementById('contact_email').value);
       formData.append('contact_phone', document.getElementById('contact_phone').value);
       formData.append('contact_message', document.getElementById('contact_message').value);
       
       store('/cms/admin/contacts', formData);
   }
</script>
@endsection





