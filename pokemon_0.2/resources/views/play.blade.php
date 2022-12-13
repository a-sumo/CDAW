@extends('layouts/template')

@section('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"> 
<style>
@import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
* {
    font-family: 'Press Start 2P', cursive;
}
</style> 

@endsection
@section('content')
<div style="display: inline-block; position: relative;">
    <div id="overlappingDiv"
    style="background-color: black; position: absolute;
    top : 0; right:0; bottom: 0; left: 0; opacity:0; pointer-events: none ">
    </div>
    <div style= "background-color: white;
        height: 140px; 
        position: absolute; 
        bottom: 0;
        left: 0;
        right: 0;
        border-top: 4px black solid;
        display: flex;">
        <div class= "grid grid-cols-2 basis-2/3 border-2">
            <button class="bg-white hover:bg-gray-100 text-gray-800 ">Attack1</button>
            <button class="bg-white hover:bg-gray-100 text-gray-800 ">Attack2</button>
            <button class="bg-white hover:bg-gray-100 text-gray-800 ">Attack3</button>
            <button class="bg-white hover:bg-gray-100 text-gray-800 ">Attack4</button>
        </div> 
        <div class= "grid grid-cols-1 basis-1/3 border-2">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold">Attack4</button>
        </div>
    </div>
    <div id="overlappingDiv"
    style="background-color: black; position: absolute;
    top : 0; right:0; bottom: 0; left: 0; opacity:0; pointer-events: none ">
    </div>
    <div 
        style="background-color: white; width: 250px; position: absolute; top: 50px; left: 50px;
        border: 4px black solid; padding: 12px;">
        <h1 style= "font-size: 16px">Draggle</h1>
        <div style= "position: relative;">
            <div style="height: 5px; background-color: #ccc; margin-top: 10px"></div>
            <div id = "enemyHealthBar" style="height: 5px;
            background-color: green;
            position: absolute; 
            top: 0;
            left: 0;
            right: 0;"></div>
        </div>
    </div>
    <div 
        style="background-color: white; width: 250px; position: absolute; top: 320px; left: 610px;
        border: 4px black solid; padding: 12px;">
        <h1 style= "font-size: 16px">Emby</h1>
        <div style= "position: relative;">
            <div style="height: 5px; background-color: #ccc; margin-top: 10px"></div>
            <div id = "playerHealthBar" style="height: 5px;
            background-color: green;
            position: absolute; 
            top: 0;
            left: 0;
            right: 0;"></div>
        </div>
    </div>
    <canvas width= "1024" height= "576"></canvas>
</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js" integrity="sha512-gmwBmiTVER57N3jYS3LinA9eb8aHrJua5iQD7yqYCKa5x6Jjc7VDVaEA0je0Lu0bP9j7tEjV3+1qUm6loO99Kw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type= "text/javascript" src="./data/battleZones.js"></script>
<script type= "text/javascript" src="./data/collisions.js"></script>
<script type= "text/javascript" src="./js/classes.js"></script>
<script type= "module" src="./js/play.js"></script>
@endsection