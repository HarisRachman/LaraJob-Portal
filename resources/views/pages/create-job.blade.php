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
                    <li class="breadcrumb-item"><a href="{{ route('listJob') }}">List Jobs</a>
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
                                <h5 class="card-title mb-0">Tambah Data Lowongan Pekerjaan</h5>
                            </div>
                            <div class="card-body">
                                <form name="autocomplete-textbox" id="autocomplete-textbox" method="post" action="#">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Judul Pekerjaan</label>
                                                <input class="form-control" type="type" name="title"
                                                    value="{{ old('title') }}" placeholder="cth: Website Developer" />
                                                <span class="text-danger">
                                                    @error('title')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Lokasi</label>
                                                <input class="form-control" type="type" id="lokasi" name="lokasi"
                                                    value="{{ old('lokasi') }}"
                                                    placeholder="cari Kota atau Kabupaten" />
                                                <span class="text-danger">
                                                    @error('lokasi')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Tipe Pekerjaan</label>
                                                <select id="lType" name="type" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option value="" hidden>--Pilih Tipe--</option>
                                                    @foreach ($listType as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('type')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Tingkat Pekerjaan</label>
                                                <select id="lType" name="type" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option value="" hidden>--Pilih Tingkat--</option>
                                                    @foreach ($listLevel as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('type')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Tingkat Pendidikan</label>
                                                <select id="lType" name="type" class="form-control selectpicker"
                                                    data-live-search="true" multiple data-max-options="3">
                                                    <option value="" hidden>--Pilih Tingkat Pendidikan--</option>
                                                    <option value="SMP/SLTP">SMP/SLTP</option>
                                                    <option value="SMA/SMK/STM">SMA/SMK/STM</option>
                                                    <option value="Diploma/D1/D2/D3">Diploma/D1/D2/D3</option>
                                                    <option value="Sarjana/S1">Sarjana/S1</option>
                                                    <option value="Master/S2">Master/S2</option>
                                                    <option value="Doctor/S3">Doctor/S3</option>
                                                    <option value="Semua Jenjang">Semua Jenjang</option>
                                                </select>
                                                <span class="text-danger">
                                                    @error('type')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Kategori Pekerjaan</label>
                                                <select id="lType" name="type" class="form-control selectpicker"
                                                    data-live-search="true" multiple data-max-options="3">
                                                    <option value="" hidden>--Pilih Tingkat Pendidikan--</option>
                                                    @foreach($subcategory as $sc => $category)

                                                    <optgroup label="{{ $sc }}">
                                                        @foreach($category as $cat)
                                                        <option value="{{ $cat->id }}">{{ $cat->subcategory_name }}</option>
                                                        @endforeach
                                                    </optgroup>

                                                    @endforeach
                                                </select>
                                                <span class="text-danger">
                                                    @error('lokasi')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Pengalaman</label>
                                                <input class="form-control" type="text" name="experience"
                                                    value="{{ old('experience') }}" placeholder="cth: 1-2 Tahun" />
                                                <span class="text-danger">
                                                    @error('experience')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Jam Kerja</label>
                                                <input class="form-control" type="type" id="jam_kerja" name="jam_kerja"
                                                    value="{{ old('jam_kerja') }}" placeholder="cth: 08.00-17.00 / Senin-Jumat" />
                                                <span class="text-danger">
                                                    @error('jam_kerja')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label">Deskripsi Pekerjaan</label>
                                                <textarea name="deskripsi"></textarea>
                                                <span class="text-danger">
                                                    @error('deskripsi')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right mt-1">
                                        <button type="submit" class="btn btn-mat waves-effect waves-light btn-info ">Submit</button>
                                        {{-- <button type="submit" class="btn btn-lg btn-primary">Submit</button> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'deskripsi' );
</script>

<script>
    $(document).ready(function() {
       $( "#lokasi" ).autocomplete({
    
           source: function(request, response) {
               $.ajax({
               url: "{{url('search-from-db')}}",
               data: {
                       term : request.term
                },
               dataType: "json",
               success: function(data){
                  var resp = $.map(data,function(obj){
                       return obj.name;
                  }); 
    
                  response(resp);
               }
           });
       },
       minLength: 4
    });
   });
    
</script>
@endsection