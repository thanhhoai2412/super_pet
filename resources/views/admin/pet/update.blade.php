@extends('layouts.admin')
@section('content_admin')
    @extends('layouts._sidebar')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Submit update ')}}{{ $com }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.pet.update',['id'=>$pet['id']])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $pet['pet'] }}" autocomplete="name" placeholder="{{ $pet['pet'] }}" autofocus required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Species') }}</label>
                                <div class="col-md-6">
                                    <select id="role" class="form-control" name="species">
                                        <option value="">- - Choose Species - -</option>
                                        @forelse($species as $v)
                                        <option value="{{$pet['id']}}">{{$pet['species']}}</option>
                                        @empty
                                        @endforelse
                                    </select>
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
                                        {{ __('Submit') }}
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
