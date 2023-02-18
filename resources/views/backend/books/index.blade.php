@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Pub Date</th>
                    <th scope="col">Category</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($bookData as $item)
                  <tr>
                    <td>{{ $item->book_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->author }}</td>
                    <td>{{ $item->publisher }}</td>
                    <td>{{ $item->dob_of_publication }}</td>

                    <td>{{ $item->name }}</td>
                    <td>
                        {{-- <a href="{{ url('books/edit/') }}/{{ $item->book_id }}" class="btn btn-sm btn-success">Edit</a> --}}
                        <a href="{{ route('books.edit',['id' => $item->book_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('books.destroy',['id' => $item->book_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
