@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Username</th>
                    <th scope="col">Book title</th>
                    <th scope="col">Borrow date</th>
                    <th scope="col">Due date</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->borrowing_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->borrowed_date }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>
                        <a href="{{ route('borrow.edit',['id' => $item->borrowing_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('borrow.destroy',['id' => $item->borrowing_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
