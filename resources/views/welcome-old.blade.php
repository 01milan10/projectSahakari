@extends('layouts.frontend.app')

@section('header')
    @include('layouts.frontend.header')
@endsection

@section('programServices')
    @include('programServices.programServices')
@endsection

@section('aboutUs')
    @include('aboutUs.aboutUs')
@endsection

@section('testimonials')
    @include('testimonials.testimonials')
@endsection

@section('gallery')
    @include('gallery.gallery')
@endsection

@section('contactUs')
    @include('contactUs.contactUs')
@endsection

@section('footer')
    @include('layouts.frontend.footer')
@endsection

@section('script')
@endsection
