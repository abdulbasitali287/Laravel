@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::label("", "Title", ['class'=>'form-label']) !!}
                    {!! Form::text("title", $userData->name, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('username')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="mb-3">
                    {!! Form::label("", "Detail", ['class'=>'form-label']) !!}
                    {!! Form::textarea("detail", $userData->details, ['class'=>'form-control']) !!}
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
