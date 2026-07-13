@extends('layouts.app')

@section('content')
<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
    <div>
        <h4 class="page-title">Dashboard</h4>
        <p class="page-subtitle">Resumen general de tu sistema</p>
    </div>
    <div>
        <nav aria-label="breadcrumb" class="breadcrumb-custom">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1" style="font-size: 0.85rem;">Total Usuarios</h6>
                <h3 class="mb-0 fw-bold">{{ $totalUsers ?? 0 }}</h3>
                <small class="text-success"><i class="fas fa-arrow-up"></i> 12%</small>
            </div>
            <div class="stat-icon primary">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1" style="font-size: 0.85rem;">Productos</h6>
                <h3 class="mb-0 fw-bold">{{ $totalProducts ?? 0 }}</h3>
                <small class="text-success"><i class="fas fa-arrow-up"></i> 5.2%</small>
            </div>
            <div class="stat-icon success">
                <i class="fas fa-boxes"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1" style="font-size: 0.85rem;">Pedidos Hoy</h6>
                <h3 class="mb-0 fw-bold">{{ $todayOrders ?? 0 }}</h3>
                <small class="text-warning"><i class="fas fa-minus"></i> 2.1%</small>
            </div>
            <div class="stat-icon warning">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="stat-card d-flex align-items-center justify-content-between">
            <div>
                <h6 class="text-muted mb-1" style="font-size: 0.85rem;">Ingresos</h6>
                <h3 class="mb-0 fw-bold">${{ number_format($revenue ?? 0, 0) }}</h3>
                <small class="text-danger"><i class="fas fa-arrow-down"></i> 0.8%</small>
            </div>
            <div class="stat-icon danger">
                <i class="fas fa-dollar-sign"></i>
            </div>
        </div>
    </div>
</div>

<!-- Gráfico y Tabla -->
<div class="row g-4">
    <!-- Gráfico (placeholder) -->
    <div class="col-xl-8">
        <div class="stat-card">
            <h6 class="fw-semibold mb-3">Ventas de la semana</h6>
            <div class="bg-light rounded p-4 text-center" style="height: 240px; display: flex; align-items: center; justify-content: center;">
                <div>
                    <i class="fas fa-chart-bar fa-3x text-secondary" style="opacity: 0.3;"></i>
                    <p class="text-muted mt-2 mb-0">Gráfico de ventas (placeholder)</p>
                    <small class="text-muted">Aquí iría un gráfico con Chart.js o similar</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Actividad reciente -->
    <div class="col-xl-4">
        <div class="stat-card">
            <h6 class="fw-semibold mb-3">Actividad Reciente</h6>
            <ul class="list-unstyled">
                @if(isset($recentActivities) && count($recentActivities) > 0)
                    @foreach($recentActivities as $activity)
                    <li class="d-flex align-items-start gap-3 mb-3 pb-2 border-bottom">
                        <span class="badge bg-{{ $activity['color'] }} rounded-circle p-2" style="width: 30px; height: 30px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-{{ $activity['icon'] }}"></i>
                        </span>
                        <div>
                            <p class="mb-0 small">{!! $activity['message'] !!}</p>
                            <small class="text-muted">{{ $activity['time'] }}</small>
                        </div>
                    </li>
                    @endforeach
                @else
                    <li class="text-center text-muted py-3">No hay actividad reciente</li>
                @endif
            </ul>
        </div>
    </div>
</div>

<!-- Tabla de últimos usuarios -->
<div class="row mt-4">
    <div class="col-12">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="fw-semibold mb-0">Últimos Usuarios Registrados</h6>
                <a href="#" class="text-decoration-none small">Ver todos <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($recentUsers) && count($recentUsers) > 0)
                            @foreach($recentUsers as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    <span class="badge bg-{{ $user['role'] == 'Admin' ? 'primary' : ($user['role'] == 'Editor' ? 'info' : 'secondary') }}">
                                        {{ $user['role'] }}
                                    </span>
                                </td>
                                <td>{{ $user['date'] }}</td>
                                <td>
                                    <span class="badge bg-{{ $user['status'] == 'Activo' ? 'success' : ($user['status'] == 'Pendiente' ? 'warning' : 'danger') }}">
                                        {{ $user['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay usuarios registrados</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .stat-card {
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
</style>
@endpush
