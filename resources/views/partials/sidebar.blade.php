<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
        <h3><i class="fas fa-cubes"></i> MiPanel</h3>
        <small>Administración</small>
    </div>

    <ul class="sidebar-menu">
        <li class="menu-label">Menú Principal</li>

        <li>
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('admin.categorias.index') }}" class="{{ request()->routeIs('admin.categories*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Categorias
            </a>
        </li>

        <li>
            <a href="#" class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                <i class="fas fa-boxes"></i> Productos
            </a>
        </li>

        <li>
            <a href="#" class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart"></i> Pedidos
                <span class="badge bg-danger ms-auto" style="font-size: 0.6rem;">12</span>
            </a>
        </li>

        <li class="menu-label mt-3">Configuración</li>

        <li>
            <a href="#">
                <i class="fas fa-cog"></i> Ajustes
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-file-alt"></i> Reportes
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-envelope"></i> Mensajes
                <span class="badge bg-primary ms-auto" style="font-size: 0.6rem;">5</span>
            </a>
        </li>

        <li class="menu-label mt-3">Sistema</li>

        <li>
            <a href="#">
                <i class="fas fa-database"></i> Backup
            </a>
        </li>

        <li>
            <a href="#">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </a>
        </li>
    </ul>
</aside>
