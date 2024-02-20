@extends('Layouts.default_with_navbar')

@section('x-head')
    <title>Projet de dev web - Suppression Classe</title>
@endsection

@section('content')

    <x-delete-form :obj="'etud'" :pk="$etud->pkEtud"/>

@endsection
