<form class="row g-3" method="post">
    @csrf
    @method($method)
    <div class="col-6">
        <label for="date" class="form-label">Date de l'épreuve</label>
        <input id="date" class="form-control @error('date') is-invalid @enderror" type="date"
               value="{{old('date') ?? $epr->date}}" name="date"/>
        @error('date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-6">
        <label for="tstart" class="form-label">Heure de départ</label>
        <input id="tstart" class="form-control @error('tstart') is-invalid @enderror" type="time"
               value="{{old('tstart') ?? $epr->tstart}}" name="tstart"/>
        @error('tstart')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-6">
        <label for="dist" class="form-label">Distance</label>
        <input type="text" class="form-control @error('dist') is-invalid @enderror" id="dist"
               value="{{old('dist') ?? $epr->dist }}" name="dist">
        @error('dist')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-6">
        <label for="anSco" class="form-label">Année Scolaire</label>
        <input type="text" class="form-control @error('anSco') is-invalid @enderror" id="anSco"
               value="{{old('anSco') ?? $epr->anSco }}" name="anSco">
        @error('anSco')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="row text-end">
        @if(isset($epr->pkEpr))
            <div class="col-6 text-start mt-5">
                <a href="{{$epr->pkEpr}}/delete" id="deleteLink" class="btn btn-outline-danger">Supprimer</a>
            </div>
        @endif
        <div class="col-6 text-end mt-5 @if(! isset($epr->pkEpr)) offset-6 @endif">
            <input type="submit" class="btn btn-primary" value="Enregistrer"/>
        </div>
    </div>
</form>
