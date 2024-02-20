<form class="row g-3" method="post">
    @csrf
    @method($method)
    <div class="col-12">
        <label for="ident" class="form-label">Identifiant</label>
        <input type="text" class="form-control @error('ident') is-invalid @enderror" id="ident"
               value="{{ old('ident') ? old('ident') : $clas->ident }}" name="ident">
        @error('ident')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-12">
        <label for="niv" class="form-label">Niveau</label>
        <input type="text" class="form-control @error('niv') is-invalid @enderror" id="niv"
               value="{{ old('niv') ? old('niv') : $clas->niv }}" name="niv">
        @error('niv')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="row text-end">
        @if(isset($clas->pkClas))
            <div class="col-6 text-start mt-5">
                <a href="{{$clas->pkClas}}/delete" id="deleteLink" class="btn btn-outline-danger">Supprimer</a>
            </div>
        @endif
        <div class="col-6 text-end mt-5 @if(! isset($clas->pkClas)) offset-6 @endif">
            <input class="btn btn-primary" type="submit" value="Enregistrer"/>
        </div>
    </div>

</form>
