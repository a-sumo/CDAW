@extends('layouts/template')
 
@section('title', 'Page Title')
 
@section('sidebar')
    <p>This is appended to the template sidebar.</p>
@endsection
 
@section('content')
<table>
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