<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <div class="container-fluid">
        <button class="btn btn-outline-light me-2" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <img src="./photos/logo.png" style="width: 140px;margin-right: 8px;" alt="watec distribution logo">
        <a class="navbar-brand fw-bold text-white" href="">Gestion des interventions</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link text-white fw-bold px-3 py-2 d-flex align-items-center" 
                       style="border-radius: 8px; background: rgba(255, 255, 255, 0.2);">
                        <i class="fas fa-user me-2"></i> 
                        <span class="text-warning">Bienvenue,</span> 
                        <span class="ms-2">{{ Auth::user()->nom }}</span>
                    </a>
                </li>
                
                @endauth

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
