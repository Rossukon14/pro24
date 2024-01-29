@extends('layouts.master_backend')
@section('contant')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">Category</h5>
        <div class="table-responsive text-nowrap">
            <a href="{{route('c.createfrom')}}" class="btn btn-success mx-3"><i class='bx bxs-plus-circle'></i> เพิ่มข้อมูล</a>
          <table class="table mt-4">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>Name</th>
                
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($category as $cat)
              <tr>
              <td>{{ $category->firstItem() + $loop->index }}</td>
              <td>{{ $cat->name }}</td>
              <td>{{ $cat->created_at }}</td>
              <td>{{ $cat->updated_at }}</td>
              <td class="tex-danger">
                <a href="{{url('admin/category/edit/'.$cat->category_id)}}"><i class='bx bxs-edit'></i></a>
                <a href="{{url('admin/category/delete'.$cat->category_id)}}"><i class='bx bx-trash'></i></a>
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="mt-3 container">
            {{ $category->links('pagination::bootstrap-5') }}
          </div>
        </div>
      </div>
    </div>

@endsection