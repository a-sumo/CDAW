@extends('layouts/template')

@section('style')
<style>
</style>
@endsection
@section('content')
<div style="display: inline-block; position: relative;">
    <div id="overlappingDiv"
    style="background-color: black; position: absolute;
    top : 0; right:0; bottom: 0; left: 0; opacity:0; pointer-events: "></div>
        <div style= "background-color: white;
         height: 140px; 
         position: absolute; 
         bottom: 0;
         left: 0;
         right: 0;
         border-top: 4px black solid;
         display: flex;">
            <div class= "grid grid-cols-2 basis-2/3 border-2 gap-1">
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold border border-gray-400 rounded shadow">Attack1</button>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold border border-gray-400 rounded shadow">Attack2</button>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold border border-gray-400 rounded shadow">Attack3</button>
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold border border-gray-400 rounded shadow">Attack4</button>
            </div>
            <div class= "grid grid-cols-1 basis-1/3 gap-1 border-2">
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold border border-gray-400 rounded shadow">Attack4</button>
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