@extends('layouts/template')

@section('content')
<table id="table-pokemon" class="display">
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
<script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
<script>
$(document).ready( function () {
  $('#table-pokemon').DataTable();
} );
<script>
@endsection
