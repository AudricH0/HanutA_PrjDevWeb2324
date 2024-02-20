@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Suppression Epreuve</title>
@endsection

@section('content')

    <x-delete-form :obj="'epr'" :pk="$epr->pkEpr"/>

@endsection
