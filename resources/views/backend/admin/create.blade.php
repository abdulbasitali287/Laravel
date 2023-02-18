@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::label("", "Username", ['class'=>'form-label']) !!}
                    {{-- {!! Form::select("category_id", $category , "", ['class'=>'form-select form-control']) !!} --}}
                    <select name="user_id" class="form-control" >
                        <option value="">Select User</option>
                        @foreach ($user as $users)
                            <option value="{{ $users->user_id }}" {{ $users->user_id == $admin->user_id ? "selected" : "" }}>{{ $users->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('user_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Role", ['class'=>'form-label']) !!}
                    {!! Form::text("role", $admin->role , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('role')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div>
                    {!! Form::submit("SUBMIT", ['class'=>'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
