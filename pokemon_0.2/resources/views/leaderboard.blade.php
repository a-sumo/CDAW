@extends('layouts/template')

@section('content')
<table id="table_users" class="display">
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

$(document).ready( function () {
  $('#myTable').DataTable();
} );

@endsection
