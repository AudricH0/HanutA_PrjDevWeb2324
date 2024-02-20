@php use Carbon\Carbon; @endphp
@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 20px;
        }
    </style>
    <title>Projet de dev web - Inscriptions</title>
@endsection

@section('content')

    @component('components.show-inscr-form', ['etud' => $etud, 'epr' => $epr]) @endcomponent

@endsection
