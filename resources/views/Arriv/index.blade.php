@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 20px;
        }
    </style>
    <title>Projet de dev web - Arrivées</title>
@endsection

@section('content')

    <div class="card p-4 mt-5">
        <x-inscr-select :allEpr="$allEpr" />
    </div>

@endsection
