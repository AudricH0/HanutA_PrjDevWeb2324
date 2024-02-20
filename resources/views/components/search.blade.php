<form class="input-group mb-3">
    <input type="text" class="form-control" placeholder="..."
           aria-label="Identifiant de la classe..." aria-describedby="search" name="search"
           value="{{ request()->input('search') }}">
    <input type="submit" class="btn btn-outline-secondary" type="button" id="search"
           value="Rechercher"/>
</form>
