@extends('index')

@section('content')
    @include('layouts.services-list', ['services_list' => $services_list])
    @include('layouts.subscribe')
@endsection