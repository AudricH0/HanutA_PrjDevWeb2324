<form class="input-group mb-3" method="post">
    @csrf

    <div>
        <select class="form-select @error('epr') is-invalid @enderror" id="epr" name="epr">

            <option selected disabled value="">Selectionnez l'épreuve</option>

            @foreach($allEpr as $e)
                <option value="{{$e->pkEpr}}">{{$e->date}}</option>
            @endforeach

        </select>
        @error('epr')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>


    <div class="ms-3">
        <input type="submit" class="btn btn-outline-secondary" type="button" id="search"
               value="Entrer"/>
    </div>

</form>
