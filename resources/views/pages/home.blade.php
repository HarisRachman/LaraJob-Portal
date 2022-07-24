@extends('layouts.dashboard')

@section('sidebar')
<div class="pcoded-inner-navbar main-menu">
    <div class="">
        <div class="main-menu-header">
            <img class="img-80 img-radius" src="{{asset('assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">John Doe<i class="fa fa-caret-down"></i></span>
            </div>
        </div>

        {{-- <div class="main-menu-content">
            <ul>
                <li class="more-details">
                    <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                    <a href="#!"><i class="ti-settings"></i>Settings</a>
                    <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                </li>
            </ul>
        </div> --}}
    </div>
    {{-- <div class="p-15 p-b-0">
        <form class="form-material">
            <div class="form-group form-primary">
                <input type="text" name="footer-email" class="form-control" required="">
                <span class="form-bar"></span>
                <label class="float-label"><i class="fa fa-search m-r-10"></i>Search
                    Friend</label>
            </div>
        </form>
    </div> --}}
    <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Pages</div>
    <ul class="pcoded-item pcoded-left-item">
        <li class="active">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li>
            <a href="{{ route('listJob') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-briefcase"></i><b>LJ</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">List Jobs</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>

</div>
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Jobs</h5>
                    <p class="m-b-0">Berikut data lowongan pekerjaan yang telah Anda unggah.</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">List Jobs</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Hello card</h5>
                                <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-chevron-left"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-times close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor
                                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection