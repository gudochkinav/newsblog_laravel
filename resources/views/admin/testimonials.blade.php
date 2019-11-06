@extends('admin.index')

@section('content')

@include('admin.layouts.testimonials-list', ['testimonials' => $testimonials])

@endsection
