@extends('layouts.app')

@section('title', 'Dashboard - Material Ortopédico')

@section('content')
<div class="container-fluid">
    <!-- Grid de Tarjetas de Métricas -->
    <div class="row g-4 mb-4">
        <!-- Compras de Hoy -->
        {{-- <div class="col-md-3">
            <div class="metric-card">
                <div class="d-flex align-items-center">
                    <div class="icon-shape icon-orange me-3">
                        <i class="bi bi-cart-check fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1" style="font-size: 0.8rem;">Compras Hoy</h6>
                        <h3 class="mb-0 fw-bold" style="color: var(--color-orange);">{{ $comprasHoy }}</h3>
                        <div class="progress mt-2" style="height: 4px; width: 100px;">
                            <div class="progress-bar progress-bar-orange" role="progressbar"
                                style="width: {{ $porcentajeCompras }}%"></div>
                        </div>
                        <small class="text-muted">Meta: {{ $metaComprasDelDia }}</small>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Total Lotes -->
        {{-- <div class="col-md-3">
            <div class="metric-card">
                <div class="d-flex align-items-center">
                    <div class="icon-shape icon-black me-3">
                        <i class="bi bi-box-seam fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1" style="font-size: 0.8rem;">Total Lotes</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalLotes }}</h3>
                        <div class="progress mt-2" style="height: 4px; width: 100px;">
                            <div class="progress-bar progress-bar-orange" role="progressbar"
                                style="width: {{ $porcentajeLotes }}%"></div>
                        </div>
                        <small class="text-muted">Capacidad de almacén</small>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Productos en Catálogo -->
        {{-- <div class="col-md-3">
            <div class="metric-card">
                <div class="d-flex align-items-center">
                    <div class="icon-shape" style="background-color: var(--color-orange-light); color: var(--color-orange-dark);">
                        <i class="bi bi-clipboard-data fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1" style="font-size: 0.8rem;">Productos</h6>
                        <h3 class="mb-0 fw-bold">{{ $totalProductos }}</h3>
                        <small class="text-muted">En catálogo</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Crítico -->
        <div class="col-md-3">
            <div class="metric-card">
                <div class="d-flex align-items-center">
                    <div class="icon-shape" style="background-color: #FEE2E2; color: #DC2626;">
                        <i class="bi bi-exclamation-triangle fs-4"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1" style="font-size: 0.8rem;">Stock Crítico</h6>
                        <h3 class="mb-0 fw-bold text-danger">{{ $productosCriticosCount }}</h3>
                        <small class="text-danger">¡Requieren atención!</small>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Productos Críticos -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2" style="color: var(--color-orange);"></i>
                        Productos con Stock Crítico
                    </h5>
                </div>
                {{-- <div class="card-body">
                    @if($productosSugeridos->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Stock Actual</th>
                                        <th>Stock Mínimo</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($productosSugeridos as $producto)
                                        <tr>
                                            <td>{{ $producto->nombre }}</td>
                                            <td><span class="text-danger fw-bold">{{ $producto->stock_real }}</span></td>
                                            <td>{{ $producto->stock_minimo }}</td>
                                            <td><span class="badge badge-orange">Crítico</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-success">
                            <i class="bi bi-check-circle-fill me-2" style="color: var(--color-orange);"></i>
                            ✅ No hay productos con stock crítico.
                        </p>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Últimas Compras -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history me-2" style="color: var(--color-orange);"></i>
                        Últimas Compras
                    </h5>
                </div>
                {{-- <div class="card-body">
                    @if($ultimasCompras->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th># Compra</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimasCompras as $compra)
                                        <tr>
                                            <td>#{{ $compra->id }}</td>
                                            <td>{{ $compra->created_at->format('d/m/Y H:i') }}</td>
                                            <td>${{ number_format($compra->total, 2) }}</td>
                                            <td><span class="badge badge-orange-light">{{ $compra->estado ?? 'Completada' }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No hay compras registradas.</p>
                    @endif
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
