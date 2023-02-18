@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::label("", "Title", ['class' => 'form-label']) !!}
                    {!! Form::text("title", $bookData->title, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Author", ['class'=>'form-label']) !!}
                    {!! Form::text("author", $bookData->author, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('author')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div class="mb-3">
                    {!! Form::label("", "Publisher", ['class'=>'form-label']) !!}
                    {!! Form::text("publisher",$bookData->publisher, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div class="mb-3">
                    {!! Form::label("", "Date of Publication", ['class'=>'form-label']) !!}
                    {{-- {!! Form::text("dob_of_publication", $bookData->dob_of_publication, ['class'=>'form-control']) !!} --}}
                    {!! Form::date("dob_of_publication", $bookData->dob_of_publication , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('dob_of_publication')
                        {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Category", ['class'=>'form-label']) !!}
                    {{-- {!! Form::select("category_id", $category , "", ['class'=>'form-select form-control']) !!} --}}
                    <select name="category_id" class="form-control" >
                        <option value="">Select Category</option>
                        @foreach ($category as $cat)
                            <option value="{{ $cat->category_id }}" {{ $cat->category_id == $bookData->category_id ? "selected" : "" }} >{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    {!! Form::submit("SUBMIT", ['class'=>'btn btn-sm btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
