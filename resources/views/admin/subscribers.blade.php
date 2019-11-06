@extends('admin.index')

@section('content')

@include('admin.layouts.subscribers-grid', ['subscribers' => $subscribers])

@endsection