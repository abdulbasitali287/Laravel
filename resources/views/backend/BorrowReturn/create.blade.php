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
                    {!! Form::label("", "Borrower", ['class' => 'form-label']) !!}
                    <select name="borrowing_id" class="form-control">
                        <option>Select Borrower</option>
                        @foreach ($borrow as $borrows)
                        <option value="{{ $borrows->borrowing_id }}" {{ $borrows->borrowing_id == $borrowReturn->borrowing_id ? "selected" : "" }}>{{ $borrows->name }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('borrowing_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Username", ['class' => 'form-label']) !!}
                    <select name="user_id" class="form-control">
                        <option>Select User</option>
                        @foreach ($user as $users)
                        <option value="{{ $users->user_id }}" {{ $users->user_id == $borrowReturn->user_id ? "selected" : "" }}>{{ $users->name }}</option>
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
                        <option value="{{ $books->book_id }}" {{ $books->book_id == $borrowReturn->book_id ? "selected" : "" }}>{{ $books->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('book_id')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div class="mb-3">
                    {!! Form::label("", "Return Date", ['class'=>'form-label']) !!}
                    {!! Form::date("returned_date", $borrowReturn->returned_date , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('returned_date')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Due Date", ['class'=>'form-label']) !!}
                    {!! Form::date("due_date", $borrowReturn->due_date , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('due_date')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Fine", ['class'=>'form-label']) !!}
                    {!! Form::number("fine", $borrowReturn->fine , ['class'=>'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit("SUBMIT", ['class'=>'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
