<div id="sidebar" class="bg-dark text-white p-3 vh-100 shadow">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-house me-2"></i> Accueil</a>
        </li>

        <!-- Intervention with Dropdown -->
        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" href="#" data-bs-toggle="collapse" data-bs-target="#interventionMenu">
                <div><i class="fas fa-tools me-2"></i> Intervention</div>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="interventionMenu">
                <li><a class="nav-link text-white" href="#"><i class="fas fa-eye me-2"></i> Consulter</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-plus-circle me-2"></i> Ajouter</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white d-flex justify-content-between align-items-center" href="#" data-bs-toggle="collapse" data-bs-target="#gestionMenu">
                <div><i class="fa-solid fa-gear"></i> Gestion</div>
                <i class="fas fa-chevron-down"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="gestionMenu">
                <li><a class="nav-link text-white" href="#"><i class="fas fa-eye me-2"></i> Utilisateur</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-plus-circle me-2"></i> Membre</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-users me-2"></i> Equipe</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-cogs me-2"></i> Materiel</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-tree me-2"></i> Nature Terrain</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-cogs me-2"></i> Type Intervention</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-bug me-2"></i> Cause</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-map-marker-alt me-2"></i> Ville</a></li>
                <li><a class="nav-link text-white" href="#"><i class="fas fa-info-circle me-2"></i> Informations</a></li>
            </ul>
        </li>
        

        <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-user me-2"></i> Mon Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#"><i class="fas fa-sign-out-alt me-2"></i> Déconnexion</a>
        </li>
    </ul>
</div>

<script>
    document.getElementById("sidebarToggle").addEventListener("click", function () {
        let sidebar = document.getElementById("sidebar");
        let content = document.getElementById("main-content");

        if (sidebar.classList.contains("hidden")) {
            sidebar.classList.remove("hidden");
            content.style.marginLeft = "250px";
        } else {
            sidebar.classList.add("hidden");
            content.style.marginLeft = "0";
        }
    });
</script>
