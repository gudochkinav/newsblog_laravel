@extends('admin.index')

@section('content')

@include('admin.layouts.portfolio-edit', ['portfolio' => $portfolio])

@endsection