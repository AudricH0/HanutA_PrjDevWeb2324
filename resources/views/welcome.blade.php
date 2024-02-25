@extends('Layouts.default_with_navbar')

@section('content')
    <div class="card">
        <div class="card-body">

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Statistiques</th>
                    <th scope="col">%</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Nombre totals d'inscriptions</td>
                    <td>{{ $totalInscrs }}</td>
                </tr>
                <tr>
                    <td>Pourcentage d'inscriptions en mode "RUN"</td>
                    <td>{{ $percentRun }}%</td>
                </tr>
                <tr>
                    <td>Pourcentage d'inscriptions en mode "WALK"</td>
                    <td>{{ $percentWalk }}%</td>
                </tr>
                <tr>
                    <td>Pourcentage d'abstentions</td>
                    <td>{{ $percentAbstention }}%</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
