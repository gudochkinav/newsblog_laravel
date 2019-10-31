@extends('index')

@section('content')

@include('layouts.banner')
@include('layouts.article', ['article' => $article])
@include('layouts.subscribe')

@endsection