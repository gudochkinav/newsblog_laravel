@extends('index')

@section('content')
    @include('layouts.banner')
    @include('layouts.portfolio-list', ['photos_list' => $photos_list])
    @include('layouts.subscribe')
@endsection('content')