@extends('backend.layouts.main')
@section('main-content')
    <div class="container">
        <h4>{{ $title }}</h4>
    </div>
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::label("", "Username", ['class' => 'form-label']) !!}
                    <select name="user_id" class="form-control">
                        <option>Select User</option>
                        @foreach ($user as $users)
                        <option value="{{ $users->user_id }}" {{ $users->user_id == $borrowData->user_id ? "selected" : "" }}>{{ $users->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('user_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Book", ['class'=>'form-label']) !!}
                    <select name="book_id" class="form-control">
                        <option>Select Book Title</option>
                        @foreach ($book as $books)
                        <option value="{{ $books->book_id }}" {{ $books->book_id == $borrowData->book_id ? "selected" : "" }}>{{ $books->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('book_id')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div class="mb-3">
                    {!! Form::label("", "Borrowed Date", ['class'=>'form-label']) !!}
                    {!! Form::date("borrowed_date", $borrowData->borrowed_date , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('borrowed_date')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Due Date", ['class'=>'form-label']) !!}
                    {!! Form::date("due_date", $borrowData->due_date , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('due_date')
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
