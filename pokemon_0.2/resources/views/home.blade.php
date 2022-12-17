@extends('layouts/template')

@section('style')
@endsection
@section('content')
<div class = "text-center py-10">
    <h1>Poké Explorer</h1>
    <div class= "py-10">This project showcases the use of the MVC pattern with Laravel 9 
        and the development of simple game mechanics in Javascript.<br><br>
        References: <br><br>
        <ul>
            <li> <a style="color: blue" href="https://www.youtube.com/watch?v=yP5DKzriqXA">Pokémon JavaScript Game Tutorial </a></li><br>
            <li><a style="color: blue" href="https://pokeapi.co/">PokéApi</li><br>
            <li><a style="color: blue" href="https://laravel.com/docs/9.x/installation">Laravel 9 Documentation</li>
        </ul> 
    </div>
</div>
@endsection
@section('script')
<script type= "module" src="./js/homepage.js"></script>
@endsection