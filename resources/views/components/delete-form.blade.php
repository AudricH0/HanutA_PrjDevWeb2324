<div class="card p-4 mt-5">
    <form class="row g-3" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <h4 class="my-4">Voulez-vous vraiment supprimer cet élément ?</h4>
        <div class="row mt-5 mb-5">
            <div class="col-6 text-center">
                <a href="/{{$obj}}/{{$pk}}" class="btn btn-success">Revenir en arrière</a>
            </div>
            <div class="col-6">
                <input type="submit" class="btn btn-outline-danger" value="Supprimer">
            </div>
        </div>
    </form>
</div>
