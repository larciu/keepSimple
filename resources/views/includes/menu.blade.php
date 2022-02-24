<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Keep simple</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @if (!Session::get('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cadastro-usuario">Cadastro</a>
                    </li>
                @endif

                @if (Session::get('user'))
                    <li class="nav-item dropdown me-6">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Session::get('user')->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/cadastro-veiculo">Cadastrar veículo</a></li>
                            <li><a class="dropdown-item" href="/cadastro-dica">Cadastrar dicas</a></li>
                            <li><a class="dropdown-item" href="/sair">Sair</a></li>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
