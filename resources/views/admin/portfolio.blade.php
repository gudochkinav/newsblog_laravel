@extends('admin.index')

@section('content')

@include('admin.layouts.portfolio-list', ['portfolio' => $portfolio])

@endsection