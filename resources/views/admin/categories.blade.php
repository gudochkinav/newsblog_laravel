@extends('admin.index')

@section('content')

@include('admin.layouts.categories-list', ['categories' => $categories])

@endsection