@php use Carbon\Carbon; @endphp
<div class="card p-4 mt-5">
    <form class="row g-3" method="post">

        <div class="col-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom"
                   value="{{$etud->nom }}" name="nom" disabled/>
        </div>
        <div class="col-6">
            <label for="pren" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="pren"
                   value="{{$etud->pren }}" name="pren" disabled/>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1" value="Masculin"
                   @if($etud->sexe === 'Masculin') checked @endif disabled>
            <label class="form-check-label" for="flexRadioDefault1">
                Masculin
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" value="Feminin"
                   @if($etud->sexe === 'Feminin') checked @endif disabled>
            <label class="form-check-label" for="flexRadioDefault2">
                Féminin
            </label>
        </div>
        <div class="col-6">
            <label for="date" class="form-label">Date de l'épreuve</label>
            <input id="date" class="form-control" type="date"
                   value="{{ $epr->date ?? ""}}" name="date" disabled/>
        </div>
        <div class="col-6">
            <label for="tstart" class="form-label">Heure de départ</label>
            <input id="tstart" class="form-control" type="time"
                   value="{{$epr->tstart ?? Carbon::createFromFormat('H:i:s', $etud->pivot->tstart )->format('H:i')}}" name="tstart" disabled/>
        </div>
        <div class="col-6">
            <label for="dist" class="form-label">Distance</label>
            <input type="text" class="form-control" id="dist"
                   value="{{$epr->dist }}" name="dist" disabled/>
        </div>
        <div class="col-6">
            <label for="anSco" class="form-label">Année Scolaire</label>
            <input type="text" class="form-control" id="anSco"
                   value="{{$epr->anSco }}" name="anSco" disabled/>
        </div>
    </form>

    <div class="col-12 mt-5 text-end">
        <a href="{{route('etud.edit', ['etud' => $etud])}}" class="btn btn-warning">Modifier l'étudiant</a>
        <a href="{{route('epr.edit', ['epr' => $epr])}}" class="btn btn-warning ms-3">Modifier l'épreuve</a>
    </div>

</div>


<div class="card p-4 mt-5 mb-5">
    <form class="row g-3" method="post">
        @method('PUT')
        @csrf
        <div class="col-6">
            <label for="noDos" class="form-label">N° Dossard</label>
            <input type="text" class="form-control" id="noDos"
                   value="{{ $etud->pivot->noDos }}" name="noDos" disabled>
        </div>
        <div class="col-6">
            <label for="rw" class="form-label">Run / Walk</label>
            <select class="form-select @error('rw') is-invalid @enderror" id="rw" name="rw" @if(!is_null($etud->pivot->tend)) disabled @endif>
                <option selected
                        value="{{$etud->pivot->rw}}">{{ $etud->pivot->rw === 'R' ? 'Run' : 'Walk'  }}</option>
                <option
                    value="{{$etud->pivot->rw === 'R' ? 'W' : 'R'}}">{{ $etud->pivot->rw === 'R' ? 'Walk' : 'Run'  }}</option>
            </select>
            @error('rw')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="tstart" class="form-label">Début de la course</label>
            <input id="tstart" class="form-control @error('tstart') is-invalid @enderror" type="time"
                   value="{{ Carbon::createFromFormat('H:i:s', $etud->pivot->tstart )->format('H:i')  }}"
                   name="tstart" @if(!is_null($etud->pivot->tend)) disabled @endif />
            @error('tstart')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-6">
            <label for="tend" class="form-label">Fin de la course</label>
            <input type="text" class="form-control" id="tend"
                   value="{{ $etud->pivot->tend ?? "Le coureur n'a pas encore terminé la course" }}" name="tend"
                   disabled>
        </div>
        <div class="col-12">
            <label for="temps" class="form-label">Temps total</label>
            <input type="text" class="form-control" id="temps"
                   value="{{ $etud->pivot->temps ?? "Le coureur n'a pas encore terminé la course" }}" name="temps"
                   disabled>
        </div>
        <div class="row text-end">
            <div class="col-6 text-end mt-5 offset-6">
                <input type="submit" class="btn btn-primary" value="Enregistrer"/>
            </div>
        </div>
    </form>
</div>
