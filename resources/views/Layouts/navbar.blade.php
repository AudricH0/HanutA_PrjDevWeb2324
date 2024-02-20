@php use Illuminate\Support\Facades\Auth; @endphp
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-xl">
        <a class="navbar-brand" href="#">Projet de dev web</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('/') ? ' active' : '' }}" aria-current="page" href="/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('clas*') ? ' active' : '' }}" href="/clas">Classes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('etud*') ? ' active' : '' }}" href="/etud">Etudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('epr*') ? ' active' : '' }}" href="/epr">Epreuves</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('inscr*') ? ' active' : '' }}" href="/inscr">Inscriptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link{{ Request::is('arriv*') ? ' active' : '' }}" href="/arriv">Arrivées</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown"
                       aria-expanded="false">{{ Auth::getUser()->login }}</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Gestion utilisateurs</a></li>
                        <li><a class="dropdown-item" href="/logout">Se déconnecter</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
