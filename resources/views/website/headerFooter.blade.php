

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('website/css/style.scss') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
   
    @yield('styles')

</head>

<body>

    @yield('content')


    <!-- footer section starts  -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3> <i class="fas fa-lightbulb"></i> educa </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi, voluptatem.</p>




                <div class="share d-flex flex-row">
                    @foreach ($links as $link)
                        <a href="#" class="{{ $link->icon }}"></a>
                    @endforeach

                </div>



            </div>

            <div class="box">
                <h3>Quick Links</h3>
                <a href="h{{ route('home') }}" class="link">Home</a>
                <a href="{{ route('about') }}" class="link">About</a>
                <a href="{{ route('courses') }}" class="link">Courses</a>
                <a href="{{ route('contact') }}" class="link">Contact</a>
            </div>

            <div class="box">
                <h3>Useful Links</h3>
                <a href="#" class="link">Help Center</a>
                <a href="#" class="link">Ask Questions</a>
                <a href="#" class="link">Send Feedback</a>
                <a href="#" class="link">Private Policy</a>
                <a href="#" class="link">Terms Of Use</a>
            </div>

            <div class="box">
                <h3>NewsLetter</h3>
                <p>Subscribe For Latest Upadates</p>
                <form action="">
                    <input name="email " id="email" type="email" placeholder="enter your email"  class="email">
                    <button  type="button" class="btn"  onclick="performStoreEmail()">Subscribe</button>
                </form>
            </div>

        </div>

        <div class="credit"> C reated by <span>Eng. Ali Saleh</span> | All Rights reserved! </div>

    </section>

    



    {{-- dashboard-js-files --}}
    {{-- <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('cms/js/crud.js') }}"></script>

    {{-- website-js-files --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="{{ asset('website/js/script.js') }}"></script>



    <script>
        
        function performStoreEmail() {
            let formData = new FormData();
            formData.append('email', document.getElementById('email').value);
            
            store('/cms/admin/subscribes', formData);
        }
    </script>

    @yield('scripts')

</body>

</html>
