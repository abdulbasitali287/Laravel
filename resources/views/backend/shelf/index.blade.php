@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Book Title</th>
                    <th scope="col">Shelf No</th>
                    <th scope="col">Floor</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($shelfJoin as $item)
                  <tr>
                    <td>{{ $item->shelf_id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->shelf_no }}</td>
                    <td>{{ $item->floor }}</td>
                    <td>
                        {{-- <a href="{{ url('books/edit/') }}/{{ $item->book_id }}" class="btn btn-sm btn-success">Edit</a> --}}
                        <a href="{{ route('shelf.edit',['id' => $item->shelf_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('shelf.destroy',['id' => $item->shelf_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
