@extends('admin.index')

@section('content')

@include('admin.layouts.service', ['service' => $service])

@endsection