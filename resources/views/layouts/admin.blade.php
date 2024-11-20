<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('contents_main/admin') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('contents_main/admin') }}/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('contents_main/admin') }}/css/style.css">
</head>

<body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle top_right_btn" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <img src="{{ asset('contents_main/admin') }}/images/avatar.png" class="img-fluid"> --}}
                            @if (Auth::User()->image != '')
                                <img src="{{ asset('uploads_main/admin/user/' . Auth::User()->image) }}"
                                    alt="User Image">
                            @else
                                <img src="{{ asset('contents_main/admin/images/avatar.png') }}" alt="User Image">
                            @endif

                            {{ Auth::User()->name }}

                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="fas fa-user-tie"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Manage Account</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ url('log-out') }}"><i class="fas fa-sign-out-alt"></i>
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </header>
    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        {{-- <img class="" src="{{asset('contents_main/admin')}}/images/avatar.png" alt="avatar"/> --}}
                        @if (Auth::User()->image != '')
                            <img src="{{ asset('uploads_main/admin/user/' . Auth::User()->image) }}" alt="User Image">
                        @else
                            <img src="{{ asset('contents_main/admin/images/avatar.png') }}" alt="User Image">
                        @endif
                        <h5>{{ Auth::User()->name }}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="{{ url('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                            @if (Auth::User()->role<=2)
                            @if (Auth::User()->role==1)
                            <li><a href="{{ url('dashboard/user') }}"><i class="fas fa-user-circle"></i> Users</a></li>
                            @endif
                            <li><a href="{{ url('dashboard/banner') }}"><i class="fas fa-images"></i> Banner</a></li>
                            @if (Auth::User()->role==1)
                            <li><a href="{{ url('dashboard/recyclebin') }}"><i class="fas fa-trash"></i> RecycleBin</a>
                            @endif
                            </li>
                            @endif
                            {{-- <li><a href="#"><i class="fas fa-comments"></i> Contact Message</a></li> --}}
                            <li><a href="{{ url('/') }}"><i class="fas fa-globe"></i> Live Site</a></li>
                            <li><a href="{{ url('log-out') }}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part mb-4">
                            {{-- <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>

                    @yield('content')

                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2024 | All rights reserved by Dashboard | Development By <a
                            href="#">Fatema Akther Prianka</a></p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('contents_main/admin') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('contents_main/admin') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('contents_main/admin') }}/js/custom.js"></script>
</body>

</html>
