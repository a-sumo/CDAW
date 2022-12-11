@extends('layouts/template')

@section('content')
<div>
<img src="<?php echo $sprites[1]; ?>">
</div>
<div>
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
console.log('<?php echo $sprites[1]; ?>')
</script>
@endsection