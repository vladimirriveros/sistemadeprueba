<nav class="navbar navbar-expand navbar-light navbar-custom px-4 py-2">
    <div class="d-flex align-items-center flex-grow-1">
        {{-- <button class="btn btn-outline-secondary btn-sm border-0 me-3" id="menu-toggle">
            <i class="bi bi-arrow-left-right fs-5"></i>
        </button> --}}

        <button class="btn btn-outline-secondary btn-sm border-0 me-3" id="menu-toggle">
    <i class="bi bi-arrow-left-right fs-5"></i>
</button>

        <div class="input-group d-none d-md-flex" style="width: 300px;">
            <input type="text" class="form-control form-control-sm border-end-0 bg-light"
                placeholder="Buscar Historia o Cama...">
            <span class="input-group-text bg-light border-start-0 text-muted">
                <i class="bi bi-search btn-sm p-0"></i>
            </span>
        </div>
    </div>

    <div class="d-none d-lg-flex align-items-center me-4 text-muted fw-medium" style="font-size: 0.85rem;">
        <i class="bi bi-building-geometric me-2" style="color: var(--color-orange);"></i>
        Campus Central - Módulo A
    </div>

    <button id="themeToggleBtn" class="btn btn-sm btn-outline-secondary px-3 py-2 d-flex align-items-center gap-2" onclick="toggleTheme()">
    <i id="themeIcon" class="bi bi-moon-fill"></i>
    <span id="themeText">Modo Oscuro</span>
</button>

    <div class="navbar-nav ms-auto align-items-center">
        <div class="dropdown">
            <a class="nav-link d-flex align-items-center py-0" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <div class="text-end d-none d-sm-block me-2">
                    <div class="text-dark fw-bold" style="font-size: 0.85rem;">{{ Auth::user()->name ?? 'Usuario' }}</div>
                    <small class="text-muted d-block" style="font-size: 0.75rem;">ID: #{{ Auth::user()->id ?? 'N/A' }}</small>
                </div>
                <i class="bi bi-chevron-down text-muted fs-7"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="bi bi-person me-2" style="color: var(--color-orange);"></i> Mi Perfil
                </a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-power me-2" style="color: var(--color-orange);"></i> Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
