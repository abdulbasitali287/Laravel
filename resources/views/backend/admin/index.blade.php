@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $item)
                  <tr>
                    <td>{{ $item->admin_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->role }}</td>
                    <td>
                        {{-- <a href="{{ url('books/edit/') }}/{{ $item->book_id }}" class="btn btn-sm btn-success">Edit</a> --}}
                        <a href="{{ route('admin.edit',['id' => $item->admin_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('admin.destroy',['id' => $item->admin_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
