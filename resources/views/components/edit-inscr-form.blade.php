<div class="col-3 mt-5 ">
    <x-search />
</div>

<div class="row mt-2 mb-5">



    <div class="col-6">
        <h4>Etudiants non inscrit</h4>

        <table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
            <thead>
            <tr>
                <th style="width: 20%" scope="col" class="x-first-column">Nom</th>
                <th style="width: 20%" scope="col">Prénom</th>
                <th style="width: 60%" scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @if($allEtudNotIn->count() > 0)

                @foreach($allEtudNotIn as $e)
                    <tr>
                        <td class="x-first-column align-middle">{{$e->nom}}</td>
                        <td class="align-middle">{{$e->pren}}</td>
                        <td class="text-end align-middle">
                            <form method="post" id="mainForm" class="form-inline align-middle">
                                <div class="form-group mr-2 align-middle">
                                    @csrf
                                    <input type="hidden" name="etud" value="{{$e->pkEtud}}">

                                    @if(($epr->tstart))
                                        <input type="hidden" name="tstart" value="$epr->tstart">
                                    @endif
                                    <input id="tstart"
                                           class="form-control-sm align-middle @error('tstart') is-invalid @enderror"
                                           type="time"
                                           name="tstart"
                                           value="{{ $epr->tstart ? $epr->tstart : '00:00' }}"
                                           @if(($epr->tstart)) disabled @endif/>
                                    <select class="bg-white form-control-sm align-middle @error('rw') is-invalid @enderror"
                                            id="rw" name="rw">
                                        <option selected disabled value=""></option>
                                        <option value="R">Run</option>
                                        <option value="W">Walk</option>
                                    </select>
                                    @error('rw')
                                    <span class="text-danger">!</span>
                                    @enderror
                                    <input type="submit" class="btn btn-outline-success" value="+">
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="x-first-column">Aucun élément trouvé</td>
                </tr>
            @endif
            </tbody>

        </table>
        {{ $allEtudNotIn->links() }}
    </div>

    <div class="col-6">
        <h4>Etudiants inscrit</h4>
        <table class="table table-hover mt-4 border border-black p-2 mb-2 border-opacity-10">
            <thead>
            <tr>
                <th style="width: 20%" scope="col" class="x-first-column">Nom</th>
                <th style="width: 20%" scope="col">Prénom</th>
                <th style="width: 20%" scope="col">N° dossard</th>
                <th style="width: 40%" scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @if($allEtudIn->count() > 0)

                @foreach($allEtudIn as $e)
                    <tr>
                        <td class="x-first-column align-middle">{{$e->nom}}</td>
                        <td class="align-middle">{{$e->pren}}</td>
                        <td class="align-middle"> @if($e->pivot)
                                {{$e->pivot->noDos}}
                            @endif </td>
                        <td class="text-end align-middle">
                            <div class="align-items-center text-end">
                                <div class="d-flex justify-content-end">
                                    <form method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="etud" value="{{$e->pkEtud}}">
                                        <input type="submit" class="btn btn-outline-danger" value="-">
                                    </form>
                                    <a href="/inscr/{{$epr->pkEpr}}/{{$e->pkEtud}}"
                                       class="btn btn-outline-primary fst-italic ms-2">i</a>
                                </div>

                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="x-first-column">Aucun élément trouvé</td>
                </tr>
            @endif
            </tbody>

        </table>
        {{ $allEtudIn->links() }}
    </div>
</div>
