@extends('admin.index')

@section('content')

@include('admin.layouts.services-list', ['services' => $services])

@endsection