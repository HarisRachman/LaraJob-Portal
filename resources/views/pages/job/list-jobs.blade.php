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
        <li>
            <a href="{{route('home')}}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="active">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-briefcase"></i><b>LJ</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">List Jobs</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li>
            <a href="{{ route('listType') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-briefcase"></i><b>LT</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Type Job</span>
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
                @if(Session::get('success'))
                <div class="alert alert-success mb-2">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Kelola Lowongan Pekerjaan Anda</h5>
                                <br>
                                <a href="{{ route('create-job') }}"
                                        class="btn btn-primary waves-effect waves-light mt-3">Tambah Data</a>
                                <div class="card-header-right">
                                    {{-- <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-trash close-card"></i></li>
                                    </ul> --}}
                                </div>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Lokasi</th>
                                                <th>Type</th>
                                                <th>Tingkat Pekerjaan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($jobs->isNotEmpty())
                                            @foreach ($jobs as $index => $job)
                                            <tr>
                                                <td scope="row">{{ $index +1 }}</td>
                                                <td>{{ $job->job_title }}</td>
                                                <td>{{ $job->job_location }}</td>
                                                <td>{{ $job->type }}</td>
                                                <td>{{ $job->level }}</td>
                                                <td style="color:white">
                                                    @if($job->status == 'Published')
                                                        <a href="#" class="dropdown-item bs-tooltip" data-myid="{{ $job->id }}" data-toggle="modal" data-target=".unpublishJob" data-original-title="Unpublish"><span class="badge badge-success" style="padding:7px">{{ $job->status }}</span></a>
                                                    @else
                                                        <a href="#" class="dropdown-item bs-tooltip" data-myid="{{ $job->id }}" data-toggle="modal" data-target=".publishJob" data-original-title="Publish"><span class="badge badge-warning" style="padding:7px">{{ $job->status }}</span></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="{{ route('edit-job', $job->id) }}" class="dropdown-item">Edit</a>
                                                            <a href="{{ route('view-job', $job->id) }}" class="dropdown-item">View</a>
                                                            <a href="#" class="dropdown-item bs-tooltip" data-myid="{{ $job->id }}" data-toggle="modal" data-target=".deleteData" data-original-title="Delete">Delete</a>
                                                            <!-- <a href="{{ route('destroy-job', $job->id) }}" onclick="return confirm('Are you sure delete this data?')" class="dropdown-item">Delete</a> -->
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6" style="text-align: center">Tidak ada Data</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="modal fade deleteData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Delete Confirmation</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p class="font-weight-bold mb-2"> Are you sure to delete this job vacancy ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="" id="formDelete" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-rounded mt-3 mb-4">Ya, Hapus!</button>
                                                <button type="button" class="btn btn-default btn-rounded mt-3 mb-4" data-dismiss="modal">Tidak, Batalkan!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade publishJob" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Job Vacancy Publishing Confirmation</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p class="font-weight-bold mb-2"> Are you sure to publish this job vacancy ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="" id="formConfirm" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-rounded mt-3 mb-4">Ya, Publish!</button>
                                                <button type="button" class="btn btn-default btn-rounded mt-3 mb-4" data-dismiss="modal">Tidak, Batalkan!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade unpublishJob" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Job Vacancy Unpublishing Confirmation</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        
                                        <div class="modal-body">
                                            <p class="font-weight-bold mb-2"> Are you sure to unpublish this job vacancy ?</p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="" id="formConfirm" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-rounded mt-3 mb-4">Ya, Unpublish!</button>
                                                <button type="button" class="btn btn-default btn-rounded mt-3 mb-4" data-dismiss="modal">Tidak, Batalkan!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.deleteData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_delete = button.data('myid')
        var url = '{{ route("destroy-job", ":id") }}';
        url = url.replace(':id', id_delete);
        var modal = $(this)
        modal.find('.modal-footer #id_delete').val(id_delete);
        modal.find('.modal-footer #formDelete').attr('action', url);
    })

    $('.publishJob').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_publish = button.data('myid')
        var url = '{{ route("publish-job", ":id") }}';
        url = url.replace(':id', id_publish);
        var modal = $(this)
        modal.find('.modal-footer #id_publish').val(id_publish);
        modal.find('.modal-footer #formConfirm').attr('action', url);
    })

    $('.unpublishJob').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_publish = button.data('myid')
        var url = '{{ route("publish-job", ":id") }}';
        url = url.replace(':id', id_publish);
        var modal = $(this)
        modal.find('.modal-footer #id_publish').val(id_publish);
        modal.find('.modal-footer #formConfirm').attr('action', url);
    })
</script>
@endsection