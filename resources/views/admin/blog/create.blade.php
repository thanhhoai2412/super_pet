@extends('layouts.admin')
@section('content_admin')
    @extends('layouts._sidebar')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Add new ')}}{{ $com }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" placeholder="Title {{ $com }}" autofocus required>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <textarea id="" type="text" class="form-control @error('content') is-invalid @enderror" rows="5" name="content" value="{{ old('content') }}" autocomplete="content" placeholder="Content {{ $com }}" autofocus ></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@endsection
