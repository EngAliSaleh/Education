<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EducationDashboard | </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('cms/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary bg-dark elevation-4">



            <div class="sidebar">



                <div class="user-panel mt-3 pb-3 mb-3 d-flex">














                    <div class="image">
                        @if (Auth::guard('admin')->id())
                            @if (auth('admin')->user()->images != '')
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('storage/images/admin/' . auth('admin')->user()->image) }}"alt="User Image">
                            @else
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/userSolid.png') }}"alt="User Image">
                            @endif
                        @elseif (Auth::guard('teacher')->id())
                            @if (auth('teacher')->user()->images != '')
                                <img src="{{ asset('storage/images/teacher/' . auth('teacher')->user()->image) }}"
                                    class="brand-image img-circle elevation-3" alt="User Image">
                            @else
                                <img class="brand-image img-circle elevation-3"
                                    src="{{ asset('images/userSolid.png') }}"alt="User Image">
                            @endif
                       

                        @endif


                    </div>




                    <div class="info">

                        @if (Auth::guard('admin')->id())
                            <a href="#" class="d-block"> {{ auth('admin')->user()->full_name }}</a>
                        @elseif (Auth::guard('teacher')->id())
                            <a href="#" class="d-block"> {{ auth('teacher')->user()->full_name }}</a>
                        @elseif (Auth::guard('trainer')->id())
                            <a href="#" class="d-block"> {{ auth('trainer')->user()->full_name }}</a>
                        @elseif (Auth::guard('student')->id())
                            <a href="#" class="d-block"> {{ auth('student')->user()->full_name }}</a>
                        @else
                            <a href="#" class="d-block"> users</a>
                        @endif
                    </div>


                </div>



                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active bg-success">
                                <i class="nav-icon fas fa-school"></i>
                                <p>
                                    {{ env('APP_NAME') }}/Dashboard

                                </p>
                            </a>

                        </li>

                        <li class="nav-header">Roles / Permissions</li>
                        @canAny('Index-Role', 'Create-Role')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-layers-fill"></i>

                                    <p>
                                        Role
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>





                                <ul class="nav nav-treeview">
                                    @can('Index-Role')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>

                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan

                                    @can('Create-Role')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>

                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-permission', 'Create-permission')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-pass-fill"></i>

                                    <p>
                                        Permission
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-permission')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>

                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-permission')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>

                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny




                        <li class="nav-header">User Mangment</li>
                        @canAny('Index-Admin', 'Create-Admin')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-person-circle"></i>
                                    <p>
                                        Admin
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>


                                <ul class="nav nav-treeview">


                                    @can('Index-Admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>

                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan





                                    @can('Create-Admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>

                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanAny


                        @canAny('Index-Teacher', 'Create-Teacher')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-person-circle"></i>

                                    <p>
                                        Teacher
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Teacher')
                                        <li class="nav-item">
                                            <a href="{{ route('teachers.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>

                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Teacher')
                                        <li class="nav-item">
                                            <a href="{{ route('teachers.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>

                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-Student', 'Create-Student')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-person-circle"></i>

                                    <p>
                                        Student
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Student')
                                        <li class="nav-item">
                                            <a href="{{ route('students.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>

                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Student')
                                        <li class="nav-item">
                                            <a href="{{ route('students.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>

                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny

                        <li class="nav-header">Content Mangment</li>



                        @canAny('Index-Country', 'Create-Country')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-city"></i>
                                    <p>
                                        Country
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Country')
                                        <li class="nav-item">
                                            <a href="{{ route('countries.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Country')
                                        <li class="nav-item">
                                            <a href="{{ route('countries.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-City', 'Create-City')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-house-fill"></i>
                                    <p>
                                        City
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-City')
                                        <li class="nav-item">
                                            <a href="{{ route('cities.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-City')
                                        <li class="nav-item">
                                            <a href="{{ route('cities.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-Subject', 'Create-Subject')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-journal-bookmark-fill"></i>

                                    <p>
                                        Subject
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Subject')
                                        <li class="nav-item">
                                            <a href="{{ route('subjects.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Subject')
                                        <li class="nav-item">
                                            <a href="{{ route('subjects.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-course', 'Create-Course')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-book"></i>
                                    <p>
                                        Course
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-course')
                                        <li class="nav-item">
                                            <a href="{{ route('courses.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Course')
                                        <li class="nav-item">
                                            <a href="{{ route('courses.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny


                        <li class="nav-header">WebSite Mangment</li>
                        @canAny('Index-slider', 'Create-slider')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-images"></i>
                                    <p>
                                        Slider
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-slider')
                                        <li class="nav-item">
                                            <a href="{{ route('sliders.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-slider')
                                        <li class="nav-item">
                                            <a href="{{ route('sliders.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan

                                </ul>
                            </li>
                        @endcanAny
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-chat-fill"></i>
                                <p>
                                    Contact
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('contacts.index') }}" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('contacts.create') }}" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        @canAny('Index-review', 'Create-review')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-emoji-smile-fill"></i>
                                    <p>
                                        Review
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-review')
                                        <li class="nav-item">
                                            <a href="{{ route('reviews.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-review')
                                        <li class="nav-item">
                                            <a href="{{ route('reviews.create') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-question', 'Create-question')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-patch-question"></i>
                                    <p>
                                        Question
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-question')
                                        <li class="nav-item">
                                            <a href="{{ route('questions.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-question')
                                        <li class="nav-item">
                                            <a href="{{ route('questions.create') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanAny
                        @canAny('Index-link', 'Create-link')
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="bi bi-browser-chrome"></i>
                                    <p>
                                        Link
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-link')
                                        <li class="nav-item">
                                            <a href="{{ route('links.index') }}" class="nav-link">
                                                <i class="fas fa-list-ul nav-icon"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-link')
                                        <li class="nav-item">
                                            <a href="{{ route('links.create') }}" class="nav-link">
                                                <i class="fas fa-plus nav-icon"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan


                                </ul>
                            </li>
                        @endcanAny
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="bi bi-person-plus-fill"></i>
                                <p>
                                    Subscriber
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('subscribes.index') }}" class="nav-link">
                                        <i class="fas fa-list-ul nav-icon"></i>
                                        <p>Index</p>
                                    </a>
                                </li>



                            </ul>
                        </li>





                        <li class="nav-header">Setting</li>

                        @if (Auth::guard('admin')->id())
                            <li class="nav-item">
                                <a href="{{ route('dashboard.editprofile') }}" class="nav-link">
                                    <i class="fas fa-user-edit nav-icon"></i>
                                    <p>Edit Your Profile</p>
                                </a>
                            </li>
                        @elseif(Auth::guard('teacher')->id())
                            <li class="nav-item">
                                <a href="{{ route('dashboard.editprofile') }}"class="nav-link">
                                    <i class="fas fa-user-edit nav-icon"></i>
                                    <p>Edit Your Profile</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::guard('admin')->id())
                            <li class="nav-item">
                                <a href="{{ route('dashboard.editpassword') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::guard('teacher')->id())
                            <li class="nav-item">
                                <a href="{{ route('dashboard.editpassword') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>Change Password</p>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="{{ route('dashboard.logout') }}" class="nav-link">
                                <i class="bi bi-door-open-fill"></i>
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>

                                <p>Log Out</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-dark">
            <!-- Content Header (Page header) -->
            <div class="content-header bg-dark">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> @yield('main-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#" style="color: white">Home</a></li>
                                <li class="breadcrumb-item active" style="color: white"> @yield('sub-title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            @yield('content')
        </div>

        <!-- Content Wrapper. Contains page content -->

        <footer class="main-footer bg-dark">
            <strong>Copyright &copy;{{ now()->year }} - {{ now()->year + 1 }} <a style="color: black"
                    href="https://adminlte.io">{{ env('APP_NAME') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> {{ env('APP_VERSION') }}
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('cms/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('cms/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('cms/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('cms/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('cms/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('cms/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('cms/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('cms/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('cms/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('cms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('cms/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('cms/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('cms/js/crud.js') }}"></script>



    @yield('scripts')




</body>

</html>
