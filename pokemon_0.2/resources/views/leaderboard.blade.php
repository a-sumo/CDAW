@extends('layouts/template')

@section('content')
<table id="table-leaderboard" class="display">
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
@endsection
@section('script')
<script>
$(document).ready( function () {
  $('#table-leaderboard').DataTable();
} );
</script>
@endsection
