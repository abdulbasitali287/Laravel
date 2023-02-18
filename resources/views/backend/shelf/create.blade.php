@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open([
                'url' => $url,
                'method' => 'POST',
            ]) !!}
                <div class="mb-3">
                    {!! Form::label("", "Category", ['class'=>'form-label']) !!}
                    {{-- {!! Form::select("category_id", $category , "", ['class'=>'form-select form-control']) !!} --}}
                    <select name="book_id" class="form-control" >
                        <option value="">Select Book</option>
                        @foreach ($book as $books)
                            <option value="{{ $books->book_id }}" {{ $books->book_id == $shelf->book_id ? "selected" : "" }}>{{ $books->title }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        @error('book_id')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    {!! Form::label("", "Shelf No", ['class'=>'form-label']) !!}
                    {!! Form::text("shelf_no", $shelf->shelf_no , ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('shelf_no')
                            {{ $message }}
                        @enderror
                    </span>
                <div>
                <div class="mb-3">
                    {!! Form::label("", "Floor", ['class'=>'form-label']) !!}
                    {!! Form::text("floor",$shelf->floor, ['class'=>'form-control']) !!}
                    <span class="text-danger">
                        @error('floor')
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
