@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    {{-- <th scope="col">Borrow id</th> --}}
                    <th scope="col">Username</th>
                    <th scope="col">Book title</th>
                    <th scope="col">Returned date</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Fine</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->return_id }}</td>
                    {{-- <td>{{ $item->borrowing_id }}</td> --}}
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->returned_date }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>{{ $item->fine }}</td>
                    <td>
                        <a href="{{ route('borrow-return.edit',['id' => $item->return_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('borrow-return.destroy',['id' => $item->return_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
