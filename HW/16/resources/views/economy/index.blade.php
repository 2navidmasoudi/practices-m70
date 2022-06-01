@extends('layout')
 
@section('title')
    {{ $cat }}
@endsection
 
@section('content')
    <h3>id: {{ $id }}</h3>
    <h3>title: {{ $title }}</h3>
@endsection