@extends('admin.index')

@section('content')

@include('admin.layouts.article-edit', ['article' => $article, 'categories' => $categories])

@endsection