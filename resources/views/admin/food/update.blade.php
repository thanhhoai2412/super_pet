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
                        <form method="POST" action="{{route('admin.food.update',['id'=>$food['id']])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $food['name'] }}" autocomplete="name" placeholder="{{ $food['name'] }}" autofocus required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="detail" class="col-md-4 col-form-label text-md-right">{{ __('Detail') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <input id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ $food['detail'] }}" autocomplete="detail" placeholder="{{ $food['detail'] }}" autofocus required>

                                    @error('detail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $validator }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }} {{ $com }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $food['price'] }}" autocomplete="price" placeholder="{{ $food['price'] }}" autofocus required>

                                    @error('price')
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
