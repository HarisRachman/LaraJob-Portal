@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form class="md-float-material form-material" action="{{ route('prosesRegister') }}" method="POST"
                autocomplete="off">
                @csrf
                <div class="text-center">
                    <img src="assets/images/logo.png" alt="logo.png">
                </div>
                <div class="auth-box card">
                    <div class="card-block">
                        @if(Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                        @endif
                        <div class="row m-b-20">
                            <div class="col-md-12">
                                <h3 class="text-center txt-primary">Sign up</h3>
                            </div>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Your Name</label>
                            <span class="text-danger">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group form-primary">
                            <select name="role" class="form-control" value="{{ old('role') }}">
                                <option value="" hidden>-- Pilih --</option>
                                <option value="2">Perusahaan</option>
                                <option value="3">Pelamar</option>
                            </select>
                            <span class="form-bar"></span>
                            <label class="float-label">Select Role</label>
                            <span class="text-danger">
                                @error('role')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group form-primary">
                            <input type="text" name="email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Your Email Address</label>
                            <span class="text-danger">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                <span class="text-danger">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group form-primary">
                                    <input type="password" name="cpassword" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Confirm Password</label>
                                    <span class="text-danger">
                                        @error('cpassword')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25 text-left">
                            <div class="col-md-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i
                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">I read and accept <a href="#">Terms &amp;
                                                Conditions.</a></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkbox-fade fade-in-primary">
                                    <label>
                                        <input type="checkbox" value="">
                                        <span class="cr"><i
                                                class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                        <span class="text-inverse">Send me the <a href="#!">Newsletter</a>
                                            weekly.</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <button type="submit"
                                    class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up
                                    now</button>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-10">
                                <p class="text-inverse text-left m-b-0">Thank you.</p>
                                <p class="text-inverse text-left"><a href="index.html"><b>Back to website</b></a></p>
                            </div>
                            <div class="col-md-2">
                                <img src="assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
</div>
@endsection