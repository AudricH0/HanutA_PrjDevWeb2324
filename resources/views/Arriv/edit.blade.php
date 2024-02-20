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

    <form class="row g-3" method="post">
        @csrf
        @method('POST')
        <div class="col-12">
            <label for="noDos" class="form-label">N° Dossard</label>
            <input type="text" class="form-control @error('noDos') is-invalid @enderror" id="noDos"
                   name="noDos">
            @error('noDos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="row text-end">
            <div class="col-6 text-end mt-5 offset-6 ">
                <input type="submit" class="btn btn-primary" type="submit" value="Enregistrer"/>
            </div>
        </div>

    </form>

    <div>
        <h5>Etudiants dans la course</h5>
        <p>Nombre étudiants arrivé : {{ $nbEtudArrive }}</p>
        <p>Nombre étudiants inscrit : {{ $nbEtud }}</p>
    </div>

    <div class="row">
        <dic class="col-6">
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
        </dic>
    </div>

@endsection
