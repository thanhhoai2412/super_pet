@extends('user.master')
@section('content_user')

    <!-- Carousel Start -->
    @include('user.layouts.carousel')
    <!-- Carousel End -->


    <!-- Booking Start -->
   @include('user.layouts.booking')
    <!-- Booking Start -->


    <!-- About Start -->
   @include('user.layouts.about')
    <!-- About End -->


    <!-- Services Start -->
    @include('user.layouts.services')
    <!-- Services End -->


    <!-- Features Start -->
    @include('user.layouts.features')
    <!-- Features End -->


    <!-- Pricing Plan Start -->
    @include('user.layouts.pricing')
    <!-- Pricing Plan End -->


    <!-- Team Start -->
    @include('user.layouts.team')
    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('user.layouts.testimonial')
    <!-- Testimonial End -->


    <!-- Blog Start -->
    @include('user.layouts.blog')
    <!-- Blog End -->




@endsection