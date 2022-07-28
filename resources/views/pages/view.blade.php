@extends('layouts.job')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-xs-12">
            <div>
                <br>

                <img src="{{asset('job/images/product-1-720x480.jpg')}}" alt="" class="img-responsive wc-image">

                <br>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-xs-12">
            <form action="#" method="post" class="form">
                <h2>{{ $job->job_title }}</h2>

                <p class="lead"><strong class="text-primary">{{ $job->salary }}</strong> <small> per bulan</small></p>

                <p class="lead">
                    <i class="fa fa-briefcase"></i> {{ $job->Category->subcategory_name }} &nbsp;&nbsp;
                    <i class="fa fa-map-marker"></i> {{ $job->job_location }} &nbsp;&nbsp;
                    <i class="fa fa-calendar"></i> {{ date('d-m-Y', strtotime($job->created_at)) }} &nbsp;&nbsp;
                    <i class="fa fa-file"></i> {{ $job->JobType->type_name }}
                </p>


            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>Job Description</h4>
        </div>

        <div class="panel-body">
            {!! $job->job_description !!}
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>About {{ $job->Company->company_name }}</h4>
        </div>

        <div class="panel-body">
            {{ $job->Company->company_description }}

            <div class="row">
                <div class="col-lg-6">

                </div>

                <div class="col-lg-6">

                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span>Company name</span>

                        <br>

                        <strong>{{ $job->Company->company_name }}</strong>
                    </p>
                </div>

                <div class="col-md-6">
                    <p>
                        <span>Contact name</span>

                        <br>

                        <strong>{{ $job->Company->contact_name }}</strong>
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <p>
                        <span>Email</span>

                        <br>

                        <strong><a href="mailto:{{ $job->Company->company_email }}">{{ $job->Company->company_email }}</a></strong>
                    </p>
                </div>

                <div class="col-md-6">
                    <p>
                        <span>Mobile phone</span>

                        <br>

                        <strong><a href="tel:{{ $job->Company->phone }}">{{ $job->Company->phone }}</a></strong>
                    </p>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6">
                    <p>
                        <span>Website</span>

                        <br>

                        <strong><a href="{{ $job->Company->website }}">{{ $job->Company->website }}/</a></strong>
                    </p>
                </div>

                <div class="col-md-6">
                    <p>
                        <span>City</span>

                        <br>

                        <strong>{{ $job->Company->city }}</strong>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <div class="clearfix">
        <a href="#" class="section-btn btn btn-primary pull-left">Apply for this job</a>

        <ul class="social-icon pull-right">
            <li><a href="#" class="fa fa-facebook"></a></li>
            <li><a href="#" class="fa fa-envelope-o"></a></li>
            <li><a href="#" class="fa fa-linkedin"></a></li>
        </ul>
    </div>
</div>
@endsection