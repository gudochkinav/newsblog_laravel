@extends('admin.index')

@section('content')

@include('admin.layouts.category-edit', ['category' => $category])

@endsection