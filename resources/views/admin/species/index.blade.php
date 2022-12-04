@extends('layouts.admin')
@section('content_admin')
  @extends('layouts._sidebar')
  @section('content')
    <div class="header-content">
      <div class="btn-add"><a href="{{ route('admin.species.create') }}">Thêm</a></div>
    </div>
    <div class="body-content">
      <table class="table" >
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th class="text-center" colspan="2" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($species as $k => $v)
            <tr>
              <td>{{ $k + 1 }}</td>
              <td>{{ $v['species'] }}</td>
              <td><a href="{{route('admin.species.edit',['id'=>$v['id']])}}">Update</a></td>
              <td><a href="{{route('admin.species.delete',['id'=>$v['id']])}}">Delete</a></td>
            </tr>
          @empty
            <tr>
              <td colspan="3">No data <a href="{{ route('admin.species.create') }}">Thêm</a></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="footer-content">
      <div class="btn-add"><a href="{{ route('admin.species.create') }}">Thêm</a></div>
    </div>
  @endsection
@endsection