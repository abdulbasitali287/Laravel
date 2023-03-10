{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Portfolio</title>

    <!-- Icons font CSS-->
<link href="{{url('frontend/assets/signup/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('frontend/assets/signup/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{url('frontend/assets/signup/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{url('frontend/assets/signup/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{url('frontend/assets/signup/css/main.css')}}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Registration Form</h2>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Company</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="company">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="form-row m-b-55">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="row row-refine">
                                    <div class="col-3">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="area_code">
                                            <label class="label--desc">Area Code</label>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="phone">
                                            <label class="label--desc">Phone Number</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Subject</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="subject">
                                            <option selected="selected">Choose option</option>
                                            <option>Subject 1</option>
                                            <option>Subject 2</option>
                                            <option>Subject 3</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row p-t-20">
                            <label class="label label--block">Are you an existing customer?</label>
                            <div class="p-t-15">
                                <label class="radio-container m-r-55">Yes
                                    <input type="radio" checked="checked" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">No
                                    <input type="radio" name="exist">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{url('frontend/assets/signup/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{url('frontend/assets/signup/vendor/select2/select2.min.js')}}"></script>
    <script src="{{url('frontend/assets/signup/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{url('frontend/assets/signup/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{url('frontend/assets/signup/js/script.js')}}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document--> --}}
@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => url('/signup/store'),
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::text("username", "", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="d-flex mb-3">
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "male", "" , ['class'=>'form-check-input']) !!}
                        {!! Form::label("", "Male", ['class'=>'form-label']) !!}
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "female", "" , ['class'=>'form-check-input']) !!}
                        {!! Form::label("", "Female", ['class'=>'form-label']) !!}
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "other", "", ['class'=>'form-check-input']) !!}
                        {!! Form::label("", "Other", ['class'=>'form-label']) !!}
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="mb-3">
                    {!! Form::label("", "Email", ['class'=>'form-label']) !!}
                    {!! Form::email("email", "", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                {{-- @if ($showPass == true) --}}
                <div class="mb-3">
                    {!! Form::label("", "Password", ['class'=>'form-label']) !!}
                    {!! Form::password("password", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                {{-- @endif --}}
                <div class="mb-3">
                    {!! Form::label("", "Phone", ['class'=>'form-label']) !!}
                    {!! Form::text("phone", "", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Address", ['class'=>'form-label']) !!}
                    {!! Form::textarea("address", "", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div>
                    {!! Form::submit("SUBMIT", ['class'=>'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
