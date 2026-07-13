<header class="topbar">
    <div class="topbar-left">
        <button class="btn-toggle-sidebar" aria-label="Toggle sidebar">
            <i class="fas fa-bars"></i>
        </button>

        <div class="d-none d-md-block">
            <h6 class="mb-0 fw-semibold">Dashboard</h6>
            <small class="text-muted" style="font-size: 0.7rem;">Bienvenido de vuelta</small>
        </div>
    </div>

    <div class="topbar-right">
        <!-- Buscador (opcional) -->
        <form class="d-none d-md-flex align-items-center" style="position: relative;">
            <input type="text" class="form-control form-control-sm" placeholder="Buscar..." style="width: 200px; border-radius: 20px; padding-left: 35px;">
            <i class="fas fa-search" style="position: absolute; left: 12px; color: #9ca3af; font-size: 0.8rem;"></i>
        </form>

        <!-- Notificaciones -->
        <div class="notification-badge">
            <i class="fas fa-bell fs-5 text-secondary"></i>
            <span class="badge">3</span>
        </div>

        <!-- Dropdown de usuario -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="avatar">AD</div>
                <span class="user-name">Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="#">
                    <i class="fas fa-user me-2"></i> Mi Perfil
                </a></li>
                <li><a class="dropdown-item" href="#">
                    <i class="fas fa-cog me-2"></i> Configuración
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
