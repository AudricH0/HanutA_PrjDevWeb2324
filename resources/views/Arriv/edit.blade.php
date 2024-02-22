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
                @if($allEtudWalk->count() > 0)
                    @foreach($allEtudWalk as $e)
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
        <div class="col-6">
            <table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
                <thead>
                <tr>
                    <th style="width: 10%" scope="col" class="x-first-column">#</th>
                    <th style="width: 20%" scope="col">Nom</th>
                    <th style="width: 20%" scope="col">Prénom</th>
                    <th style="width: 20%" scope="col">Temps</th>
                </tr>
                </thead>
                <tbody>
                @if($allEtudRun->count() > 0)
                    @php $count = 1; @endphp
                    @foreach($allEtudRun as $e)
                        <tr>
                            <td class="x-first-column">{{$count}}</td>
                            <td>{{$e->nom}}</td>
                            <td>{{$e->pren}}</td>
                            <td>{{$e->pivot->temps}}</td>
                        </tr>
                        @php $count++; @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" class="x-first-column">Aucun élément trouvé</td>
                    </tr>
                @endif
                </tbody>

            </table>
        </div>
    </div>

@endsection
