@extends('layouts.dashboard')

@section('sidebar')

    <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Pages</div>
    <ul class="pcoded-item pcoded-left-item">
        <li>
            <a href="{{route('home')}}" class="waves-effect waves-dark">
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
        <li>
            <a href="{{ route('listType') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-briefcase"></i><b>JT</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Job Types</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="active">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-briefcase"></i><b>JL</b></span>
                <span class="pcoded-mtext" data-i18n="nav.form-components.main">Job Levels</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>
    
@endsection

@section('content')
<!-- Page-header start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">List Job Type</h5>
                    <p class="m-b-0">Berikut data tipe lowongan pekerjaan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">List Job Type</a>
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
                                <h5>Kelola Tipe Lowongan Pekerjaan</h5>
                                <br>
                                <a href="#" data-toggle="modal" data-target=".addData" data-original-title="Add Data"
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
                                                <th>Job Level Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($levels->isNotEmpty())
                                            @foreach ($levels as $index => $level)
                                            <tr>
                                                <td scope="row">{{ $index +1 }}</td>
                                                <td>{{ $level->joblevel_name }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Action
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a href="#" data-myid="{{ $level->id }}" data-myname="{{ $level->joblevel_name }}" data-toggle="modal" data-target=".editData" data-original-title="Edit" class="dropdown-item">Edit</a>
                                                            <a href="#" class="dropdown-item bs-tooltip" data-myid="{{ $level->id }}" data-toggle="modal" data-target=".deleteData" data-original-title="Delete">Delete</a>
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

                            <div class="modal fade addData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('store-level') }}" method="POST">
                                        @csrf
                                            <div class="modal-header">
                                                <h3 class="modal-title">Add Data</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-4">
                                                            <label class="form-label">Job Level Name</label>
                                                            <input class="form-control" type="text" name="joblevel_name"
                                                                value="{{ old('joblevel_name') }}" placeholder="Type Here.." />
                                                            <span class="text-danger">
                                                                @error('joblevel_name')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-rounded mt-3 mb-4">Submit</button>
                                                <button type="button" class="btn btn-default btn-rounded mt-3 mb-4" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade editData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="" id="formEdit" method="POST">
                                        @csrf
                                        @method('PATCH')
                                            <div class="modal-header">
                                                <h3 class="modal-title">Edit Data</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-4">
                                                            <label class="form-label">Job Level Name</label>
                                                            <input class="form-control" type="text" id="joblevel_name" name="joblevel_name"
                                                                value="{{ old('joblevel_name') }}" placeholder="Type Here.." />
                                                            <span class="text-danger">
                                                                @error('joblevel_name')
                                                                {{ $message }}
                                                                @enderror
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success btn-rounded mt-3 mb-4">Submit</button>
                                                <button type="button" class="btn btn-default btn-rounded mt-3 mb-4" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
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
                                            <p class="font-weight-bold mb-2"> Are you sure to delete this job type ?</p>
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
        var url = '{{ route("destroy-level", ":id") }}';
        url = url.replace(':id', id_delete);
        var modal = $(this)
        modal.find('.modal-footer #id_delete').val(id_delete);
        modal.find('.modal-footer #formDelete').attr('action', url);
    })

    $('.editData').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var id_edit = button.data('myid')
        var type_name = button.data('myname')
        var url = '{{ route("update-level", ":id") }}';
        url = url.replace(':id', id_edit);
        var modal = $(this)
        modal.find('.modal-body #joblevel_name').val(type_name);
        modal.find('#formEdit').attr('action', url);
    })
</script>
@endsection