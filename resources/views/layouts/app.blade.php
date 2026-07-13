<!DOCTYPE html>
<html lang="es" data-bs-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HospitalOS')</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ============================================
           VARIABLES CSS - COLORES CORPORATIVOS
           ============================================ */
        :root {
            --color-orange: #F97316;
            --color-orange-dark: #EA580C;
            --color-orange-light: #FFEDD5;
            --color-orange-hover: #D97706;
            --color-black: #1E1E1E;
            --color-white: #FFFFFF;
            --color-gray-light: #F8FAFC;
            --color-gray-dark: #1E293B;
        }

        /* ============================================
           ESTILOS GLOBALES
           ============================================ */
        body {
            overflow-x: hidden;
            background-color: var(--color-gray-light);
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        #wrapper {
            display: flex;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        /* ============================================
           SIDEBAR - MODO CLARO
           ============================================ */
        #sidebar-container {
            min-width: 260px;
            max-width: 260px;
            background-color: var(--color-black);
            color: var(--color-white);
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        [data-bs-theme="light"] #sidebar-container {
            background-color: var(--color-white) !important;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.05);
        }

        [data-bs-theme="light"] #sidebar-container .sidebar-heading {
            background-color: var(--color-gray-light) !important;
            border-bottom: 1px solid #E2E8F0 !important;
        }

        [data-bs-theme="light"] #sidebar-container .sidebar-heading .fw-bold {
            color: var(--color-black) !important;
        }

        [data-bs-theme="light"] #sidebar-container .user-panel {
            border-bottom: 1px solid #E2E8F0 !important;
        }

        [data-bs-theme="light"] #sidebar-container .user-panel .info .d-block {
            color: var(--color-black) !important;
        }

        [data-bs-theme="light"] #sidebar-container .user-panel .info small {
            color: #64748B !important;
        }

        [data-bs-theme="light"] #sidebar-container .nav-link {
            color: #475569 !important;
        }

        [data-bs-theme="light"] #sidebar-container .nav-link:hover {
            background-color: var(--color-orange-light) !important;
            color: var(--color-orange) !important;
        }

        [data-bs-theme="light"] #sidebar-container .nav-link.active {
            background-color: var(--color-orange) !important;
            color: var(--color-white) !important;
        }

        [data-bs-theme="light"] #sidebar-container .nav-link i {
            color: #475569 !important;
        }

        [data-bs-theme="light"] #sidebar-container .nav-link.active i {
            color: var(--color-white) !important;
        }

        [data-bs-theme="light"] #sidebar-container .menu-header {
            color: #64748B !important;
        }

        [data-bs-theme="light"] #sidebar-container .border-slate {
            border-color: #E2E8F0 !important;
        }

        [data-bs-theme="light"] #sidebar-container .btn-dark {
            background-color: var(--color-gray-light) !important;
            border-color: #E2E8F0 !important;
            color: var(--color-black) !important;
        }

        [data-bs-theme="light"] #sidebar-container .btn-dark:hover {
            background-color: #E2E8F0 !important;
        }

        [data-bs-theme="light"] #sidebar-container .badge.border-teal {
            background-color: var(--color-orange) !important;
            color: var(--color-white) !important;
        }

        /* ============================================
           SIDEBAR - MODO OSCURO
           ============================================ */
        [data-bs-theme="dark"] #sidebar-container {
            background-color: var(--color-black) !important;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.3);
        }

        [data-bs-theme="dark"] #sidebar-container .sidebar-heading {
            background-color: #0F172A !important;
            border-bottom: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .sidebar-heading .fw-bold {
            color: var(--color-white) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .user-panel {
            border-bottom: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .user-panel .info .d-block {
            color: var(--color-white) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .user-panel .info small {
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .nav-link {
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .nav-link:hover {
            background-color: rgba(249, 115, 22, 0.1) !important;
            color: var(--color-orange) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .nav-link.active {
            background-color: var(--color-orange) !important;
            color: var(--color-white) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .nav-link i {
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .nav-link.active i {
            color: var(--color-white) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .menu-header {
            color: #64748B !important;
        }

        [data-bs-theme="dark"] #sidebar-container .border-slate {
            border-color: #334155 !important;
        }

        [data-bs-theme="dark"] #sidebar-container .btn-dark {
            background-color: #0F172A !important;
            border-color: #334155 !important;
            color: var(--color-white) !important;
        }

        [data-bs-theme="dark"] #sidebar-container .btn-dark:hover {
            background-color: rgba(249, 115, 22, 0.1) !important;
            color: var(--color-orange) !important;
        }

        /* ============================================
           SIDEBAR - ESTILOS BASE
           ============================================ */
        #sidebar-container .sidebar-heading {
            padding: 1.25rem;
            font-size: 1.25rem;
            transition: background-color 0.3s, border-color 0.3s;
        }

        #sidebar-container .user-panel {
            padding: 0.75rem 1rem;
            transition: border-color 0.3s;
        }

        #sidebar-container .user-panel .info .d-block {
            font-weight: 600;
            font-size: 0.9rem;
            transition: color 0.3s;
        }

        #sidebar-container .user-panel .info small {
            font-size: 0.75rem;
            font-weight: 500;
            transition: color 0.3s;
        }

        #sidebar-container .user-panel .info small .bi-circle-fill {
            color: var(--color-orange) !important;
        }

        #sidebar-container .user-panel img {
            border-color: #E2E8F0;
            transition: border-color 0.3s;
        }

        [data-bs-theme="dark"] #sidebar-container .user-panel img {
            border-color: #334155 !important;
        }

        #sidebar-container .nav-link {
            padding: 0.65rem 1rem;
            display: flex;
            align-items: center;
            border-radius: 0.375rem;
            margin: 0.2rem 0.75rem;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        #sidebar-container .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        #sidebar-container .menu-header {
            font-size: 0.75rem;
            text-transform: uppercase;
            padding: 0.75rem 1.25rem 0.25rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            transition: color 0.3s;
        }

        #sidebar-container .border-slate {
            border-top: 1px solid;
            transition: border-color 0.3s;
        }

        #sidebar-container .btn-dark {
            transition: all 0.3s;
        }

        /* ============================================
           TOPBAR
           ============================================ */
        .navbar-custom {
            background-color: var(--color-white);
            border-bottom: 1px solid #E2E8F0;
            transition: background-color 0.3s, border-color 0.3s;
        }

        [data-bs-theme="dark"] .navbar-custom {
            background-color: var(--color-black) !important;
            border-bottom: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] .navbar-custom .text-muted,
        [data-bs-theme="dark"] .navbar-custom small {
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] .navbar-custom .input-group input,
        [data-bs-theme="dark"] .navbar-custom .input-group-text {
            background-color: #0F172A !important;
            color: #F8FAFC !important;
            border: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] .navbar-custom .text-dark {
            color: #F8FAFC !important;
        }

        [data-bs-theme="dark"] #menu-toggle {
            color: #F8FAFC !important;
            border-color: #334155 !important;
        }

        /* ============================================
           CONTENIDO PRINCIPAL
           ============================================ */
        #page-content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            overflow-x: hidden;
        }

        main.p-4 {
            background-color: var(--color-gray-light);
            transition: background-color 0.3s;
        }

        [data-bs-theme="dark"] main.p-4 {
            background-color: #0F172A !important;
        }

        /* ============================================
           COMPONENTES - MÉTRICAS
           ============================================ */
        .metric-card {
            background: var(--color-white);
            border-radius: 0.5rem;
            border: 1px solid #E2E8F0;
            padding: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
            position: relative;
            transition: all 0.3s;
        }

        .metric-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.15);
            border-color: var(--color-orange);
        }

        .metric-card .icon-shape {
            width: 48px;
            height: 48px;
            border-radius: 0.375rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            transition: all 0.3s;
        }

        /* Iconos con colores corporativos */
        .icon-orange {
            background-color: var(--color-orange-light) !important;
            color: var(--color-orange) !important;
        }

        .icon-orange-dark {
            background-color: var(--color-orange) !important;
            color: var(--color-white) !important;
        }

        .icon-black {
            background-color: var(--color-black) !important;
            color: var(--color-white) !important;
        }

        .icon-white {
            background-color: var(--color-white) !important;
            color: var(--color-black) !important;
            border: 2px solid #E2E8F0;
        }

        /* Barras de progreso naranja */
        .progress-bar-orange {
            background-color: var(--color-orange) !important;
        }

        /* ============================================
           MODO OSCURO - COMPONENTES
           ============================================ */
        [data-bs-theme="dark"] .metric-card,
        [data-bs-theme="dark"] .card {
            background-color: var(--color-black) !important;
            color: #F8FAFC !important;
            border: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] .card-header {
            background-color: var(--color-black) !important;
            color: #F8FAFC !important;
            border-bottom: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] .text-dark,
        [data-bs-theme="dark"] h2,
        [data-bs-theme="dark"] h3,
        [data-bs-theme="dark"] h5 {
            color: #F8FAFC !important;
        }

        [data-bs-theme="dark"] .table-light {
            background-color: #334155 !important;
            color: #CBD5E1 !important;
        }

        [data-bs-theme="dark"] .table text-muted,
        [data-bs-theme="dark"] .text-secondary {
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] .bg-light,
        [data-bs-theme="dark"] .input-group-text {
            background-color: var(--color-black) !important;
            color: #F8FAFC !important;
            border-color: #334155 !important;
        }

        [data-bs-theme="dark"] input.form-control {
            background-color: #0F172A !important;
            color: #F8FAFC !important;
            border-color: #334155 !important;
        }

        /* ============================================
           ESTILOS PARA BADGES Y ETIQUETAS
           ============================================ */
        .badge-orange {
            background-color: var(--color-orange) !important;
            color: var(--color-white) !important;
        }

        .badge-orange-light {
            background-color: var(--color-orange-light) !important;
            color: var(--color-orange) !important;
        }

        .badge-black {
            background-color: var(--color-black) !important;
            color: var(--color-white) !important;
        }

        /* ============================================
           BOTONES CON COLORES CORPORATIVOS
           ============================================ */
        .btn-orange {
            background-color: var(--color-orange);
            color: var(--color-white);
            border: none;
            transition: all 0.3s;
        }

        .btn-orange:hover {
            background-color: var(--color-orange-dark);
            color: var(--color-white);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
        }

        .btn-outline-orange {
            color: var(--color-orange);
            border: 2px solid var(--color-orange);
            background: transparent;
            transition: all 0.3s;
        }

        .btn-outline-orange:hover {
            background-color: var(--color-orange);
            color: var(--color-white);
        }

        /* ============================================
           ESTILOS PARA TABLAS EN MODO OSCURO
           ============================================ */
        [data-bs-theme="dark"] .table {
            color: #F8FAFC !important;
        }

        [data-bs-theme="dark"] .table thead th {
            border-bottom: 2px solid #334155 !important;
            color: #94A3B8 !important;
        }

        [data-bs-theme="dark"] .table td,
        [data-bs-theme="dark"] .table th {
            border-color: #334155 !important;
        }

        [data-bs-theme="dark"] .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.02) !important;
        }

        [data-bs-theme="dark"] .table-hover>tbody>tr:hover {
            background-color: rgba(249, 115, 22, 0.05) !important;
        }

        /* ============================================
           RESPONSIVE
           ============================================ */
        @media (max-width: 768px) {
            #sidebar-container {
                position: fixed;
                left: -260px;
                top: 0;
                height: 100vh;
                z-index: 1050;
                transition: left 0.3s;
            }

            #sidebar-container.open {
                left: 0;
            }

            #page-content-wrapper {
                width: 100%;
            }
        }

        /* ============================================
           CLASES UTILITARIAS ADICIONALES
           ============================================ */
        .text-orange {
            color: var(--color-orange) !important;
        }

        .text-orange-dark {
            color: var(--color-orange-dark) !important;
        }

        .bg-orange {
            background-color: var(--color-orange) !important;
        }

        .bg-orange-light {
            background-color: var(--color-orange-light) !important;
        }

        .border-orange {
            border-color: var(--color-orange) !important;
        }

        /* ===== MODALES - BOTÓN CERRAR (X) ===== */
        .modal .btn-close {
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat !important;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .modal .btn-close:hover {
            opacity: 1;
        }

        [data-bs-theme="dark"] .modal .btn-close {
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath d='M.293.293a1 1 0 011.414 0L8 6.586 14.293.293a1 1 0 111.414 1.414L9.414 8l6.293 6.293a1 1 0 01-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 01-1.414-1.414L6.586 8 .293 1.707a1 1 0 010-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat !important;
        }

        [data-bs-theme="dark"] .modal-content {
            background-color: var(--color-black) !important;
            color: #F8FAFC !important;
            border-color: #334155 !important;
        }

        [data-bs-theme="dark"] .modal-header {
            border-bottom: 1px solid #334155 !important;
        }

        [data-bs-theme="dark"] .modal-footer {
            border-top: 1px solid #334155 !important;
        }

        /* ===== ESTILOS PARA FORMULARIOS EN MODO OSCURO ===== */
        [data-bs-theme="dark"] .form-control,
        [data-bs-theme="dark"] .form-select {
            background-color: #0F172A !important;
            color: #F8FAFC !important;
            border-color: #334155 !important;
        }

        [data-bs-theme="dark"] .form-control::placeholder {
            color: #64748B !important;
        }

        [data-bs-theme="dark"] .form-control:focus,
        [data-bs-theme="dark"] .form-select:focus {
            border-color: var(--color-orange) !important;
            box-shadow: 0 0 0 0.2rem rgba(249, 115, 22, 0.25) !important;
        }

        [data-bs-theme="dark"] .form-label {
            color: #F8FAFC !important;
        }

        [data-bs-theme="dark"] .input-group-text {
            background-color: var(--color-black) !important;
            color: #94A3B8 !important;
            border-color: #334155 !important;
        }
    </style>
    @livewireStyles
    @stack('styles')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="wrapper">
        @include('partials.sidebar')
        <div id="page-content-wrapper">
            @include('partials.topbar')
            <main class="p-4 flex-grow-1">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ============================================
    // FUNCIÓN GLOBAL PARA TOGGLE TEMA
    // ============================================
    function toggleTheme() {
        const html = document.documentElement;
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);

        const icon = document.getElementById('themeIcon');
        const text = document.getElementById('themeText');

        if (icon) {
            if (newTheme === 'dark') {
                icon.className = 'bi bi-sun-fill';
                icon.style.color = '#F97316';
                text.innerText = 'Claro';
            } else {
                icon.className = 'bi bi-moon-fill';
                icon.style.color = '#1E1E1E';
                text.innerText = 'Oscuro';
            }
        }
    }

    // Cargar tema guardado
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        const html = document.documentElement;
        html.setAttribute('data-bs-theme', savedTheme);

        const icon = document.getElementById('themeIcon');
        const text = document.getElementById('themeText');

        if (icon) {
            if (savedTheme === 'dark') {
                icon.className = 'bi bi-sun-fill';
                icon.style.color = '#F97316';
                text.innerText = 'Claro';
            } else {
                icon.className = 'bi bi-moon-fill';
                icon.style.color = '#1E1E1E';
                text.innerText = 'Oscuro';
            }
        }
    });
    // ============================================
    // 1. TOGGLE SIDEBAR
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        if (menuToggle) {
            menuToggle.addEventListener('click', function(e) {
                e.preventDefault();
                const sidebar = document.getElementById('sidebar-container');
                if (sidebar) {
                    sidebar.classList.toggle('open');
                    // Forzar cambio de display para móvil
                    if (window.innerWidth <= 768) {
                        if (sidebar.classList.contains('open')) {
                            sidebar.style.display = 'flex';
                        } else {
                            sidebar.style.display = 'none';
                        }
                    }
                }
            });
        }
    });

    // ==========================================

    // Cargar tema guardado al iniciar
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        const html = document.documentElement;
        html.setAttribute('data-bs-theme', savedTheme);

        const icon = document.getElementById('themeIcon');
        const text = document.getElementById('themeText');

        if (icon && text) {
            if (savedTheme === 'dark') {
                icon.className = 'bi bi-sun-fill';
                icon.style.color = '#F97316';
                text.innerText = 'Claro';
            } else {
                icon.className = 'bi bi-moon-fill';
                icon.style.color = '#1E1E1E';
                text.innerText = 'Oscuro';
            }
        }
    });

    // ============================================
    // 3. TOGGLE CONTRASEÑA
    // ============================================
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[type="password"]').forEach(function(input) {
            let wrapper = input.closest('.password-wrapper');
            if (!wrapper) {
                wrapper = document.createElement('div');
                wrapper.className = 'password-wrapper position-relative';
                input.parentNode.insertBefore(wrapper, input);
                wrapper.appendChild(input);
            }

            const toggleBtn = document.createElement('button');
            toggleBtn.type = 'button';
            toggleBtn.className =
                'password-toggle-btn position-absolute end-0 top-50 translate-middle-y';
            toggleBtn.style.zIndex = '10';
            toggleBtn.style.padding = '0.375rem 0.75rem';
            toggleBtn.style.textDecoration = 'none';
            toggleBtn.style.background = 'transparent';
            toggleBtn.style.border = 'none';
            toggleBtn.innerHTML = '<i class="bi bi-eye"></i>';

            wrapper.appendChild(toggleBtn);
            input.style.paddingRight = '2.5rem';

            toggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const icon = this.querySelector('i');
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.className = 'bi bi-eye-slash';
                } else {
                    input.type = 'password';
                    icon.className = 'bi bi-eye';
                }
            });
        });
    });
</script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
