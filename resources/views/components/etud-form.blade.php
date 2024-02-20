<div class="card p-4 mt-5">
    <form class="row g-3" method="post">
        @csrf
        @method($method)
        <div class="col-12">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                   value="{{ old('nom') ?? $etud->nom }}" name="nom">
            @error('nom')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="col-12">
            <label for="pren" class="form-label">Prénom</label>
            <input type="text" class="form-control @error('pren') is-invalid @enderror" id="pren"
                   value="{{old('pren') ?? $etud->pren }}" name="pren">
            @error('pren')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="col-12">
            <div class="form-check @error('sexe') is-invalid @enderror">
                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1" value="Masculin" @if($etud->sexe === 'Masculin') checked @endif >
                <label class="form-check-label" for="flexRadioDefault1">
                    Masculin
                </label>
                @error('sexe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-check @error('sexe') is-invalid @enderror" >
                <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" value="Feminin" @if($etud->sexe === 'Feminin') checked @endif>
                <label class="form-check-label" for="flexRadioDefault2">
                    Féminin
                </label>
                @error('sexe')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="mb-3">
                <label for="clas" class="form-label">Classe</label>
                <select class="form-select @error('clas') is-invalid @enderror" id="clas" name="clas">


                    @if(isset($etud->fkClas))
                        <option selected value="{{$etud->fkClas}}">{{ $etud->clas->ident  }}</option>
                    @else
                        <option selected disabled value="">Selectionnez la classe</option>
                    @endif

                    @foreach($allClas as $c)
                        @if(isset($c->pkClas) && isset($etud->clas->pkClas))
                            @if($etud->clas->pkClas != $c->pkClas)
                                <option value="{{$c->pkClas}}">{{$c->ident}}</option>
                            @endif
                        @else
                            <option value="{{$c->pkClas}}">{{$c->ident}}</option>
                        @endif

                    @endforeach

                </select>
                @error('clas')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row text-end">
            @if(isset($etud->pkEtud))
                <div class="col-6 text-start mt-5">
                    <a href="{{$etud->pkEtud}}/delete" id="deleteLink" class="btn btn-outline-danger">Supprimer</a>
                </div>
            @endif
            <div class="col-6 text-end mt-5 @if(! isset($etud->pkEtud)) offset-6 @endif">
                <input type="submit" class="btn btn-primary" value="Enregistrer"/>
            </div>
        </div>

    </form>
</div>
