<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-2" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <img src="./photos/logo.png" style="width: 140px;margin-right: 8px;" alt="watec distribution logo">
        <a class="navbar-brand fw-bold text-white" href="">Gestion des interventions</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="fas fa-user"></i>Bienvenue: user</a>
                </li>

                <li class="nav-item">
                    <form action="{{ route('utilisateur.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link text-white" style="background: none; border: none;">
                            <i class="fas fa-sign-out-alt"></i> Déconnexion
                        </button>
                    </form>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
