@extends('layouts.admin')
@section('content_admin')
  @extends('layouts._sidebar')
  @section('content')
    <div class="header-content">
      <div class="btn-add"><a href="{{ route('admin.blog.create') }}">Thêm</a></div>
    </div>
    @if(session()->has('msg'))
      <b style="color: green">{{session()->get('msg')}}</b>
      <br>
  @endif
    <div class="body-content">
      <table class="table" >
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">title</th>
            <th scope="col">content</th>
            <th colspan="2" scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($blogs as $k => $v)
            <tr class="table-item">
              <td>{{ $k + 1}}</td>
              <td>{{ $v['title'] }}</td>
              <td>{{ $v['content'] }}</td>
              <td><a href="{{route('admin.blog.edit',['id'=>$v['id']])}}">Update</a></td>
              <td><a href="{{route('admin.blog.delete',['id'=>$v['id']])}}">Delete</a></td>
            </tr>
          @empty
            <tr>
              <td colspan="5">No data <a href="{{ route('admin.blog.create') }}">Thêm</a></td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="footer-content">
      <div class="btn-add"><a href="{{ route('admin.blog.create') }}">Thêm</a></div>
    </div>
  @endsection
@endsection