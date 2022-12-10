@extends('layouts/template')

@section('content')
<table id="table-users" class="display">
        <thead>
            <tr>
                <th> id</th>
                <th> name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td> {{$user->id}} </td>
                <td> {{$user->name}} </td>
            </tr>
            @endforeach
    </tbody>
</table>
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
@endsection
@section('script')
<script>
$(document).ready( function () {
  $('#table-users').DataTable();
} );
$(document).ready( function () {
  $('#table-pokemons').DataTable();
} );
</script>
@endsection