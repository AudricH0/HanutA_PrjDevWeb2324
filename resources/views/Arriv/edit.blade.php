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
            <table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
                <thead>
                <tr>
                    <th style="width: 20%" scope="col" class="x-first-column">Nom</th>
                    <th style="width: 20%" scope="col">Prénom</th>
                </tr>
                </thead>
                <tbody>
                @if($allEtud->count() > 0)
                    @foreach($allEtud as $e)
                        <tr>
                            <td class="x-first-column">{{$e->nom}}</td>
                            <td>{{$e->pren}}</td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2" class="x-first-column">Aucun élément trouvé</td>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>
    </div>

@endsection
