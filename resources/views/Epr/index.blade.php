@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 40px;
        }
    </style>
    <title>Projet de dev web - Classes</title>
@endsection

@section('content')

    <x-epr-table :allEpr="$allEpr" />

@endsection
