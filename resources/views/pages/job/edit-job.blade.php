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
        <li class="active">
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
    </ul>
    
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
                                @if(Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                                @endif

                                @if(Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <form name="autocomplete-textbox" id="autocomplete-textbox" method="post"
                                    action="{{ route('update-job', $job->id) }}">
                                    @csrf
                                    @method('patch')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label">Judul Pekerjaan</label>
                                                <input class="form-control" type="type" name="title"
                                                    value="{{ $job->job_title }}"
                                                    placeholder="cth: Website Developer" />
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
                                                    value="{{ $job->job_location }}"
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
                                                    <option value="{{ $key }}" {{ $key==$job->type_id ? 'selected' : ''
                                                        }}>{{ $value }}</option>
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
                                                <select id="lType" name="level" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option value="" hidden>--Pilih Tingkat--</option>
                                                    @foreach ($listLevel as $key => $value)
                                                    <option value="{{ $key }}" {{ $key==$job->joblevel_id ? 'selected' :
                                                        '' }}>{{ $value }}</option>
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
                                                <select id="lType" name="education[]" class="form-control selectpicker"
                                                    data-live-search="true" multiple data-max-options="3">
                                                    <option value="" hidden>--Pilih Tingkat Pendidikan--</option>
                                                    <option value="SMP/SLTP" {{ (in_array("SMP/SLTP", explode(",",
                                                        $job->education))) ? 'selected' : '' }}>SMP/SLTP</option>
                                                    <option value="SMA/SMK/STM" {{ (in_array("SMA/SMK/STM", explode(",",
                                                        $job->education))) ? 'selected' : '' }}>SMA/SMK/STM</option>
                                                    <option value="Diploma/D1/D2/D3" {{ (in_array("Diploma/D1/D2/D3",
                                                        explode(",", $job->education))) ? 'selected' : ''
                                                        }}>Diploma/D1/D2/D3</option>
                                                    <option value="Sarjana/S1" {{ (in_array("Sarjana/S1", explode(",",
                                                        $job->education))) ? 'selected' : '' }}>Sarjana/S1</option>
                                                    <option value="Master/S2" {{ (in_array("Master/S2", explode(",",
                                                        $job->education))) ? 'selected' : '' }}>Master/S2</option>
                                                    <option value="Doctor/S3" {{ (in_array("Doctor/S3", explode(",",
                                                        $job->education))) ? 'selected' : '' }}>Doctor/S3</option>
                                                    <option value="Semua Jenjang" {{ (in_array("Semua Jenjang",
                                                        explode(",", $job->education))) ? 'selected' : '' }}>Semua
                                                        Jenjang</option>
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
                                                <select id="lType" name="category" class="form-control selectpicker"
                                                    data-live-search="true">
                                                    <option value="" hidden>--Pilih Tingkat Pendidikan--</option>
                                                    @foreach ($category as $cat)
                                                    <optgroup label="{{ $cat->category_name }}">
                                                        @foreach ($cat->SubCategory as $sub)
                                                        <option value="{{ $sub->id }}" {{ $sub->id == $job->category_id
                                                            ? 'selected' : '' }}>{{ $sub->subcategory_name }}</option>
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
                                                    value="{{ $job->experience }}" placeholder="cth: 1-2 Tahun" />
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
                                                    value="{{ $job->work_time }}"
                                                    placeholder="cth: 08.00-17.00 / Senin-Jumat" />
                                                <span class="text-danger">
                                                    @error('jam_kerja')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label">Range Salary</label>
                                                <input class="form-control" type="range" name="salary1" id="salary1"
                                                    value="1" min="1" max="25"
                                                    oninput="salary1Output.value = salary1.value+' Jt'" />
                                                <span><output id="salary1Output">1 Jt</output></span>
                                                <span class="text-danger">
                                                    @error('salary1')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-4">
                                                <label class="form-label"> </label>
                                                <input class="form-control" type="range" name="salary2" id="salary2"
                                                    value="3" min="1" max="25"
                                                    oninput="salary2Output.value = salary2.value+' Jt'"
                                                    value="{{ old('salary2') }}" />
                                                <span><output id="salary2Output">3 Jt</output></span>
                                                <span class="text-danger">
                                                    @error('salary2')
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
                                                <textarea name="deskripsi">{{ $job->job_description }}</textarea>
                                                <span class="text-danger">
                                                    @error('deskripsi')
                                                    {{ $message }}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-right mt-1">
                                        <button type="submit"
                                            class="btn btn-mat waves-effect waves-light btn-info ">Submit</button>
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