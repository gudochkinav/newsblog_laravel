@extends('admin.index')

@section('content')

@include('admin.layouts.articles-list', ['articles' => $articles])

@endsection