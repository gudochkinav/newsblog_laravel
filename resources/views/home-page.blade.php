@extends('index')

@section('content')

@include('layouts.banner')
@include('layouts.portfolio-short-list', ['portfolio_short_list' => $portfolio_short_list])
@include('layouts.services-short-list', ['services_short_list' => $services_short_list])
@include('layouts.testimonials-list', ['testimonials_list' => $testimonials_list])
@include('layouts.blog-short-list', ['articles_short_list' => $articles_short_list])
@include('layouts.subscribe')

@endsection