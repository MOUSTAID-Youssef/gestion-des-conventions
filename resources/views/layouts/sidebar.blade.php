<div id="sidebar" class="bg-dark text-white p-3 vh-100 shadow">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('map') }}"><i class="fas fa-house me-2"></i> Accueil</a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" href="#"
                data-bs-toggle="collapse" data-bs-target="#interventionMenu">
                <div><i class="fas fa-tools me-2"></i> Interventions</div>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="interventionMenu">
                <li><a class="nav-link text-white" href="{{ route('intervention.index') }}"><i
                            class="fas fa-eye me-2"></i> Consulter</a></li>
                <li><a class="nav-link text-white" href="{{ route('intervention.create') }}"><i
                            class="fas fa-plus-circle me-2"></i> Ajouter</a></li>
            </ul>
        </li>
        @if(Auth::user()->privilege == 'admin')
        <div class="gestionMenu" style="padding-bottom: 37px;">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('utilisateur.index') }}"><i
                        class="fa-regular fa-user"></i> Utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('membre.index') }}"><i class="fa-solid fa-user"></i>
                    Membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('equipe.index') }}"><i class="fas fa-users me-2"></i>
                    Equipes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('materiel.index') }}"><i class="fa-solid fa-toolbox"></i>
                    Matériels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('terrain.index') }}"><i class="fas fa-tree me-2"></i>
                    Natures Terrains</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('type.index') }}"><i
                        class="fa-solid fa-triangle-exclamation"></i> Types Interventions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('cause.index') }}"><i class="fa-solid fa-question"></i>
                    Causes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ville.index') }}"><i
                        class="fas fa-map-marker-alt me-2"></i> Villes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('informations.index') }}"><i
                        class="fas fa-info-circle me-2"></i> Informations</a>
            </li>
        </div>
        @elseif(Auth::user()->privilege == 'user')
        <div class="gestionMenu" style="padding-bottom: 37px;">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('informations.index') }}"><i
                        class="fas fa-info-circle me-2"></i> Informations</a>
            </li>
        </div>
    @endif
    </ul>
</div>

<script>
    document.getElementById("sidebarToggle").addEventListener("click", function() {
        let sidebar = document.getElementById("sidebar");
        let content = document.getElementById("main-content");

        if (sidebar.classList.contains("hidden")) {
            sidebar.classList.remove("hidden");
            content.style.marginLeft = "240px"; /* Adjust according to sidebar width */
            content.style.width = "calc(100% - 240px)";
        } else {
            sidebar.classList.add("hidden");
            content.style.marginLeft = "0";
            content.style.width = "100%";
        }
    });
</script>
