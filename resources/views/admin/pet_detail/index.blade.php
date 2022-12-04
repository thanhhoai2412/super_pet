@extends('layouts.admin')
@section('content_admin')
    @extends('layouts._sidebar')
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('Submit update ')}}{{ $com }}</div>
                    @if(session()->has('msg'))
                        <b style="color: green">{{session()->get('msg')}}</b>
                        <br>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.detail.update',['id'=>$details['id']])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} {{ $com }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $details['name'] }}" autocomplete="name" placeholder="{{ $details['name'] }}" autofocus required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Weight') }} {{ $com }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $details['weight'] }}" autocomplete="weight" placeholder="{{ $details['weight'] }}" autofocus required>
                                    @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
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
