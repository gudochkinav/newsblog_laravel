@extends('index')

@section('content')
    @include('layouts.banner')
    @include('layouts.articles-list', ['articles_list' => $articles_list])
    @include('layouts.subscribe')
@endsection