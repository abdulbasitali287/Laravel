@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::text("username", $userData->name, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="d-flex mb-3">
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "male", $userData->gender == "male" ? "checked" : "" , ['class'=>'form-check-input']) !!}
                        {!! Form::label("", "Male", ['class'=>'form-label']) !!}
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "female", $userData->gender == "female" ? "checked" : "" , ['class'=>'form-check-input']) !!}
                        {!! Form::label("", "Female", ['class'=>'form-label']) !!}
                        <span class="text-danger">
                            @error('gender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-check mx-1">
                        {!! Form::radio("gender", "other", $userData->gender == "other" ? "checked" : "" , ['class'=>'form-check-input']) !!}
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
                    {!! Form::email("email", $userData->email, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                @if ($showPass == true)
                <div class="mb-3">
                    {!! Form::label("", "Password", ['class'=>'form-label']) !!}
                    {!! Form::password("password", ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                @endif
                <div class="mb-3">
                    {!! Form::label("", "Phone", ['class'=>'form-label']) !!}
                    {!! Form::text("phone", $userData->phone, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('phone')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Address", ['class'=>'form-label']) !!}
                    {!! Form::textarea("address", $userData->address, ['class'=>'form-control']) !!}
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
