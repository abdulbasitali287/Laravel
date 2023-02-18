@extends('backend.layouts.main')
@section('main-content')
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Category</th>
                    <th scope="col">Detail</th>
                    <th scope="col">Edit | Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->details }}</td>
                    <td>
                        <a href="{{ route('category.edit',['id' => $item->category_id]) }}" class="btn btn-sm btn-success">Edit</a>
                        <a href="{{ route('category.destroy',['id' => $item->category_id]) }}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
