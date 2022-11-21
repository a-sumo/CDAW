@extends('layouts/template')
 
@section('title', 'Page Title')
 
@section('sidebar')
    <p>This is appended to the template sidebar.</p>
@endsection
 
@section('content')
    <p>Pokemon List: {{ $name }}</p>
@endsection