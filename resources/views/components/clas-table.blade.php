<div class="mt-4">
    <div class="row">
        <div class="col-3">

            <x-search />

        </div>
        <div class="col-3 offset-6 text-end">
            <a class="btn btn-outline-primary" href="/clas/create">Créer une classe</a>
        </div>
    </div>

</div>

<table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
    <thead>
    <tr>
        <th style="width: 25%" scope="col" class="x-first-column">Identifiant </th>
        <th style="width: 25%" scope="col">Niveau </th>
        <th style="width: 25%" scope="col">Dernière modification </th>
        <th style="width: 25%" scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if($allClas->count() > 0)
        @foreach($allClas as $c)
            <tr>
                <td class="x-first-column">{{$c->ident}}</td>
                <td>{{$c->niv}}</td>
                <td>{{$c->updated_at->diffForHumans()}}</td>
                <td class="text-end"><a href="/clas/{{$c->pkClas}}" class="text-dark"><strong><i
                                class="bi bi-chevron-right"></i></strong></a></td>

            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4" class="x-first-column">Aucun élément trouvé</td>
        </tr>
    @endif
    </tbody>

</table>

<div>
    {{ $allClas->links() }}
</div>
