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
    @if($allEtud->count() > 0)
        @php $count = 1; @endphp
        @foreach($allEtud as $e)
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
