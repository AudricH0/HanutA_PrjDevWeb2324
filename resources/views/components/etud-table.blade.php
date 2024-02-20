<div class="mt-4">
    <div class="row">
        <div class="col-3">

            <x-search />

        </div>
        <div class="col-3 offset-6 text-end">
            <a class="btn btn-outline-primary" href="/etud/create">Créer un étudiant</a>
        </div>
    </div>

</div>

<table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
    <thead>
    <tr>
        <th style="width: 20%" scope="col" class="x-first-column">Nom</th>
        <th style="width: 20%" scope="col">Prénom</th>
        <th style="width: 20%" scope="col">Sexe</th>
        <th style="width: 20%" scope="col">Dernière modification</th>
        <th style="width: 20%" scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if($allEtud->count() > 0)
        @foreach($allEtud as $e)
            <tr>
                <td class="x-first-column">{{$e->nom}}</td>
                <td>{{$e->pren}}</td>
                <td>{{$e->sexe}}</td>
                <td>{{$e->updated_at->diffForHumans()}}</td>
                <td class="text-end"><a href="/etud/{{$e->pkEtud}}" class="text-dark"><strong><i
                                class="bi bi-chevron-right"></i></strong></a></td>

            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="5" class="x-first-column">Aucun élément trouvé</td>
        </tr>
    @endif
    </tbody>

</table>

{{ $allEtud->links() }}
