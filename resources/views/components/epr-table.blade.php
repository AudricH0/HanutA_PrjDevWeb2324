<div class="mt-4">
    <div class="row">
        <div class="col-3">

            <x-search />

        </div>
        <div class="col-3 offset-6 text-end">
            <a class="btn btn-outline-primary" href="/epr/create">Créer une épreuve</a>
        </div>
    </div>

</div>

<table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
    <thead>
    <tr>
        <th style="width: 14%" scope="col" class="x-first-column">Date </th>
        <th style="width: 14%" scope="col">Heure de départ </th>
        <th style="width: 14%" scope="col">Distance </th>
        <th style="width: 14%" scope="col">Nb parts </th>
        <th style="width: 14%" scope="col">Année scolaire </th>
        <th style="width: 14%" scope="col">Dernière modif. </th>
        <th style="width: 14%" scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if($allEpr->count() > 0)
        @foreach($allEpr as $e)
            <tr>
                <td class="x-first-column">{{$e->date}}</td>
                <td>{{$e->tstart}}</td>
                <td>{{$e->dist}}</td>
                <td>{{$e->nbPart}}</td>
                <td>{{$e->anSco}}</td>
                <td>{{$e->updated_at->diffForHumans()}}</td>
                <td class="text-end"><a href="/epr/{{$e->pkEpr}}" class="text-dark"><strong><i
                                class="bi bi-chevron-right"></i></strong></a></td>

            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="7" class="x-first-column">Aucun élément trouvé</td>
        </tr>
    @endif
    </tbody>

</table>

<div>
    {{ $allEpr->links() }}
</div>
