@extends('backend.layouts.main')
@section('main-content')
<div class="row">
    <div class="col-lg-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $user }}</h1>
              <p class="card-text">Users</p>
              <a href="{{ route('user.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $book }}</h1>
              <p class="card-text">Books</p>
              <a href="{{ route('books.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $category }}</h1>
              <p class="card-text">Category</p>
              <a href="{{ route('category.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center mt-5" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $borrow }}</h1>
              <p class="card-text">Borrow</p>
              <a href="{{ route('borrow.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center mt-5" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $borrowReturn }}</h1>
              <p class="card-text">Borrow Return</p>
              <a href="{{ route('borrow-return.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center mt-5" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $shelf }}</h1>
              <p class="card-text">Shelf</p>
              <a href="{{ route('shelf.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
    <div class="col-lg-4">
        <div class="card text-center mt-5" style="width: 18rem;">
            <div class="card-body">
              <h1 class="card-title">{{ $admin }}</h1>
              <p class="card-text">Admins</p>
              <a href="{{ route('admin.index') }}" class="btn btn-primary">Show</a>
            </div>
          </div>
    </div>
</div>
@endsection
