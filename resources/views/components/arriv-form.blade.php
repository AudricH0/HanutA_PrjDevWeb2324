<div class="card p-4 mt-5">
    <h2>Encodage des arrivées</h2>
    <h6>Nombre d'étudiants arrivés : {{ $nbEtudArrive }}/{{ $nbEtud }}</h6>
    <form class="row g-3 mt-3" method="post">
        @csrf
        @method('POST')
        <div class="col-12 input-group mb-3">
            <span class="input-group-text" id="basic-addon1">N° Dossard</span>
            <input type="text" class="form-control @error('noDos') is-invalid @enderror" placeholder="N° de dossard"
                   aria-label="Username" aria-describedby="basic-addon1" name="noDos">
            @error('noDos')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="row text-end">
            <div class="col-6 text-end mt-2 offset-6 ">
                <input type="submit" class="btn btn-primary" value="Enregistrer"/>
            </div>
        </div>

    </form>
</div>
