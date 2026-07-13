<div id="sidebar-container">
    <div class="sidebar-heading d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <!-- Logo de la empresa -->
            <img src="{{ asset('img/avatar.jpg') }}" alt="Logo Empresa" height="30" class="me-2">

        </div>

    </div>

    {{-- <div class="user-panel p-3 d-flex align-items-center">
        <img src="{{ asset('img/avatar.jpg') }}" class="rounded-3 me-3 border border-secondary" alt="Médico Avatar"
            width="42" height="42">
        <div class="info">
            <span class="d-block text-white fw-semibold lh-sm" style="font-size: 0.9rem;">
                {{ Auth::user()->name ?? 'Usuario' }}
            </span>
            <small class="fw-medium" style="font-size: 0.75rem; color: var(--color-orange);">
                <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem; color: var(--color-orange);"></i>
                {{ Auth::user()->email ?? 'Activo' }}
            </small>
        </div>
    </div> --}}

    <div class="overflow-y-auto flex-grow-1 mt-2">
        <div class="menu-header">Centro Clínico</div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Panel de Monitoreo
            </a>
        </nav>

        <div class="menu-header mt-2">ITEMS</div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}"
                href="{{ route('admin.categorias.index') }}">
                <i class="bi bi-list"></i>
                <span>Categorias</span>
            </a>
            {{-- <a class="nav-link {{ request()->routeIs('admin.proveedores.*') ? 'active' : '' }}"
                href="{{ route('admin.proveedores.index') }}">
                <i class="bi bi-truck"></i>
                <span>Proveedores</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}"
                href="{{ route('admin.productos.index') }}">
                <i class="bi bi-clipboard-check"></i>
                <span>Productos</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.instrumentals.*') ? 'active' : '' }}"
                href="{{ route('admin.instrumentals.index') }}">
                <i class="bi bi-tools"></i>
                <span>Instrumentales</span>
            </a>
            <a class="nav-link {{ request()->routeIs('admin.lotes.*') ? 'active' : '' }}"
                href="{{ route('admin.lotes.index') }}">
                <i class="bi bi-box-seam"></i> Control de Lotes
            </a>
            <a class="nav-link {{ request()->routeIs('admin.movimientos.*') ? 'active' : '' }}"
                href="{{ route('admin.movimientos.index') }}">
                <i class="bi bi-clipboard2-pulse"></i> Historial de Movimientos
            </a>
            <a class="nav-link {{ request()->routeIs('admin.inventarios.*') ? 'active' : '' }}"
                href="{{ route('admin.inventarios.index') }}">
                <i class="bi bi-box-seam"></i> Inventario / Stock
            </a> --}}
        </nav>

        <div class="menu-header mt-2">Logística Médica</div>
        <nav class="nav flex-column">
            {{-- <a class="nav-link {{ request()->routeIs('admin.hospitales.*') ? 'active' : '' }}"
                href="{{ route('admin.hospitales.index') }}">
                <i class="bi bi-building"></i> Hospitales / Clínicas
            </a>
            <a class="nav-link {{ request()->routeIs('admin.doctores.*') ? 'active' : '' }}"
                href="{{ route('admin.doctores.index') }}">
                <i class="bi bi-person-badge"></i> Cuerpo Médico
            </a>
            <a class="nav-link {{ request()->routeIs('admin.pacientes.*') ? 'active' : '' }}"
                href="{{ route('admin.pacientes.index') }}">
                <i class="bi bi-people"></i> Pacientes
            </a> --}}
        </nav>

        <div class="menu-header mt-2">Gestión Comercial</div>
        <nav class="nav flex-column">
            {{-- <a class="nav-link {{ request()->routeIs('admin.ventas.*') ? 'active' : '' }}"
                href="{{ route('admin.ventas.index') }}">
                <i class="bi bi-cash-coin" style="color: var(--color-orange);"></i> Cierre de Ventas
            </a> --}}
        </nav>

        <div class="menu-header mt-2">Configuración corporativa</div>
        <nav class="nav flex-column">
            {{-- <a class="nav-link {{ request()->routeIs('admin.compras.*') ? 'active' : '' }}"
                href="{{ route('admin.compras.index') }}">
                <i class="bi bi-receipt"></i> Compras / Abastecimiento
            </a>
            <a class="nav-link {{ request()->routeIs('admin.salidas.*') ? 'active' : '' }}"
                href="{{ route('admin.salidas.index') }}">
                <i class="bi bi-cart-dash-fill" style="color: var(--color-orange);"></i> Salidas Quirúrgicas
            </a>
            <a class="nav-link {{ request()->routeIs('admin.trabajadores.*') ? 'active' : '' }}"
                href="{{ route('admin.trabajadores.index') }}">
                <i class="bi bi-person-vcard" style="color: var(--color-orange);"></i> Personal / Trabajadores
            </a> --}}
        </nav>
    </div>

    <div class="p-3 border-top border-slate" style="border-color: #334155;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-orange btn-sm w-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-power me-2"></i> Cerrar Sesión
            </button>
        </form>
    </div>
</div>
