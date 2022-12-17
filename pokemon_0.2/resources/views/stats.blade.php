@extends('layouts/template')

@section('content')
<div class = "text-center py-10">Pokédex</div>
<div style="
display: grid; 
grid-template-columns: repeat(12, 40px);">
@foreach($sprites as $sprite)
<img src="<?php print_r($sprite); ?>">
@endforeach
</div>
<div style="margin: 30px">
    <table id="table-pokemons" class="display">
            <thead>
                <tr>
                    <th> id</th>
                    <th> name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pokemons as $pokemon)
                <tr>
                    <td> {{$pokemon->id}} </td>
                    <td> {{$pokemon->name}} </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
$(document).ready( function () {
  $('#table-pokemons').DataTable();
} );
</script>
@endsection