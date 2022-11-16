<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@yield('title') | TaskTracker</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="/assets/style/bootstrap/bootstrap.min.css"> --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    {{-- <link rel="stylesheet" href="/assets/style/bootstrap/select2.min.css">
    <link rel="stylesheet" href="/assets/style/bootstrap/sweetalert.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    {{-- <link href="/assets/style/bootstrap/simple-line-icons.css"
          rel="stylesheet"> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css"
          rel="stylesheet">
    {{-- <link rel="stylesheet" href="/assets/style/bootstrap/flag-icon.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    {{-- <link href="/assets/style/bootstrap/bootstrap-toggle.min.css" rel="stylesheet"> --}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" type="text/css" href="/assets/style/bootstrap/datatables.min.css"/> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    {{-- <link rel="stylesheet" href="/assets/style/bootstrap/jquery.toast.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet"
          href="/assets/style/bootstrap/bootstrap-datetimepicker.css"> --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assetes/img/logo-red-black.png') }}">

    @yield('page_css')
    <link href="{{mix('assets/style/css/style.css')}}" rel="stylesheet" type="text/css"/>
    @yield('css')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('assets/img/logo-red-black.png')}}" width="50px"
             alt="SM Logo">&nbsp;&nbsp;<span class="navbar-brand-full">SEMIOTIFY</span>
        <img class="navbar-brand-minimized" src="{{asset('assets/img/logo-red-black.png')}}" width="50px"
             alt="SM Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 10px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ Auth::user()->image_path }}" alt="" class="img-avatar">
                <span class="pr-3 align-middle">{!! Auth::user()->name !!}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="#" class="dropdown-item btn btn-primary btn btn-default btn-flat edit-profile"
                   data-toggle="modal" data-id="{{ getLoggedInUserId() }}">
                    <i class="fa fa-user"></i>Profile
                </a>
                <a href="#" class="dropdown-item btn btn-primary btn btn-default btn-flat"
                   data-toggle="modal" data-id="{{ getLoggedInUserId() }}" data-target="#ChangePasswordModal">
                    <i class="fa fa-key"></i>Change Password
                </a>
                <a class="dropdown-item" href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                   onclick="event.preventDefault(); localStorage.clear(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i>Logout
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('layouts.sidebar')
    <main class="main">
        @yield('content')
        @include('profile.edit_profile')
        @include('profile.change_password')
    </main>
</div>

@include('time_tracker.index');
@include('time_tracker.adjust_time_entry');

<footer class="app-footer justify-content-between">
    <div>
        <a href="https://semiotify.com">SEMIOTIFY </a>
        <span>&copy; 2022 - {{date('Y')}} Semiotify.</span>
    </div>
    <div>
        <span>Powered by</span>
        <a href="#">IT, SEMIOTIFY</a>
    </div>
</footer>
</body>
<!-- jQuery 3.1.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
@yield('page_js')
<script src="{{mix('assets/js/custom.js')}}" type="text/javascript"></script>
<script>
    let loggedInUserId = "{{ getLoggedInUserId() }}";
    let storeTimeEntriesUrl = "{{route('time-entries.store')}}";
    let myTasksUrl = "{{url('my-tasks')}}";
    let myProjectsUrl = "{{url('my-projects')}}";
    let lastTaskWorkUrl = "{{url('user-last-task-work')}}";
    let closeWatchImg = "{{asset('assets/img/close.png')}}";
    let stopWatchImg = "{{asset('assets/img/stopwatch.png')}}";
    let usersUrl = "{{ url('users') }}/";
    let projectsUrl = "{{ url('projects') }}/";
    let startTimerUrl = "{{ url('start-timer') }}";
    let pusherAppKey = "{{config('broadcasting.connections.pusher.key')}}";
    let pusherAppCluster = "{{config('broadcasting.connections.pusher.options.cluster')}}";
    let pusherBroadcaster = "{{config('broadcasting.connections.pusher.driver')}}";
    let baseUrl = "{{url('/')}}/";
</script>
<script src="{{ mix('assets/js/time_tracker/time_tracker.js') }}"></script>
@yield('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{ mix('assets/js/profile/profile.js') }}"></script>
<script>
    var loginUrl = '{{ route('login') }}';
    // Loading button plugin (removed from BS4)
    (function ($) {
        $.fn.button = function (action) {
            if (action === 'loading' && this.data('loading-text')) {
                this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
            }
            if (action === 'reset' && this.data('original-text')) {
                this.html(this.data('original-text')).prop('disabled', false);
            }
        };
    }(jQuery));

</script>
</html>
