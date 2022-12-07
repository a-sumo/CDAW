<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div> -->
    </div>
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

</x-app-layout>
