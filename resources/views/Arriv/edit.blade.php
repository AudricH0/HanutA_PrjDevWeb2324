@extends('Layouts.default_with_navbar')

@section('x-head')
    <style>
        .table .x-first-column {
            padding-left: 40px;
        }
    </style>
    <title>Projet de dev web - Arrivées</title>
@endsection

@section('content')


    @component('components.arriv-form', ['nbEtudArrive' => $nbEtudArrive, 'nbEtud' => $nbEtud]) @endcomponent


    <div class="row">
        <div class="col-6">
            <h4 class="text-center mt-3 ">WALK</h4>
            @component('components.arriv-table', ['allEtud' => $allEtudWalk]) @endcomponent

        </div>
        <div class="col-6">
            <h4 class="text-center mt-3 ">RUN</h4>
            @component('components.arriv-table', ['allEtud' => $allEtudRun]) @endcomponent
        </div>
    </div>

@endsection
