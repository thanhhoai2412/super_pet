@extends('user.master')
@section('content_user')

    <!-- About Start -->
   @include('user.layouts.about')
   <!-- About End -->
    <!-- Features Start -->
    @include('user.layouts.features')
    <!-- Features End -->
     <!-- Team Start -->
     @include('user.layouts.team')
     <!-- Team End -->
@endsection