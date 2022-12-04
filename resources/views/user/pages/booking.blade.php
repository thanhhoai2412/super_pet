@extends('user.master')
@section('content_user')
   <!-- Services Start -->
   @include('user.layouts.services')
   <!-- Services End -->
    <!-- Booking Start -->
    @include('user.layouts.booking')
    <!-- Booking Start -->
   <!-- Pricing Plan Start -->
   @include('user.layouts.pricing')
   <!-- Pricing Plan End -->
@endsection