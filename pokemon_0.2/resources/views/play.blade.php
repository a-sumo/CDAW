@extends('layouts/template')

@section('content')
<canvas></canvas>
@endsection
@section('script')
<script type= "text/javascript" src="./data/battleZones.js"></script>
<script type= "text/javascript" src="./data/collisions.js"></script>
<script type= "text/javascript" src="./js/classes.js"></script>
<script type= "module" src="./js/play.js"></script>
@endsection