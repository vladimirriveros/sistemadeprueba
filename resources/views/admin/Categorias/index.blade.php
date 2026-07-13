@extends('layouts.app')

@section('title', 'HospitalOS - Gestión de Categorías')

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 fw-bold text-dark m-0">Categorías</h2>
            <p class="text-muted small m-0">Administración de categorías para clasificar productos.</p>
        </div>
        <button class="btn text-white d-flex align-items-center" style="background-color: #F97316;" data-bs-toggle="modal" data-bs-target="#modalCrear">
            <i class="bi bi-plus-circle me-2"></i> Nueva Categoría
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> Por favor corrige los errores del formulario.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle table-borderless mb-0">
                    <thead class="table-light text-secondary" style="font-size: 0.85rem;">
                        <tr>
                            <th class="ps-4">#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            {{-- <th class="text-center">Estado</th> --}}
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 0.9rem;">
                        @forelse($categorias as $categoria)
                            <tr class="border-bottom">
                                <td class="ps-4 fw-bold text-secondary">{{ $categoria->id }}</td>
                                <td>
                                    <span class="fw-bold text-dark d-block">{{ $categoria->nombre }}</span>
                                    <small class="text-muted">Creado: {{ $categoria->created_at->format('d/m/Y') }}</small>
                                </td>
                                <td>
                                    <span class="text-muted">{{ $categoria->descripcion ?? 'Sin descripción' }}</span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group btn-group-sm">
                                        <button class="btn btn-outline-secondary" title="Ver detalle"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalVer{{ $categoria->id }}">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button class="btn btn-outline-primary" title="Editar"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEditar{{ $categoria->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-outline-danger" title="Eliminar"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalEliminar{{ $categoria->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- MODAL VER CATEGORÍA -->
                            <div class="modal fade" id="modalVer{{ $categoria->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header bg-light">
                                            <h5 class="modal-title fw-bold"><i class="bi bi-info-circle me-2"></i> Detalle de Categoría</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center mb-3">
                                                <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                    <i class="bi bi-tags fs-1 text-secondary"></i>
                                                </div>
                                            </div>
                                            <h4 class="fw-bold text-dark text-center mb-1">{{ $categoria->nombre }}</h4>
                                            <p class="text-muted text-center mb-3">ID: #{{ $categoria->id }}</p>

                                            <div class="border p-3 rounded bg-light">
                                                <p class="text-muted mb-0">{{ $categoria->descripcion ?? 'No hay descripción registrada.' }}</p>
                                            </div>

                                            <div class="row g-2 mt-3">

                                                <div class="col-12">
                                                    <div class="p-2 border rounded bg-light">
                                                        <small class="text-muted d-block">Fecha Creación</small>
                                                        <strong>{{ $categoria->created_at->format('d/m/Y H:i') }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light border-top-0">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL EDITAR CATEGORÍA -->
                            <div class="modal fade" id="modalEditar{{ $categoria->id }}" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-header text-white" style="background-color: #1e293b;">
                                            <h5 class="modal-title fw-bold"><i class="bi bi-pencil-square me-2"></i> Editar Categoría</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.categorias.update', $categoria->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label small fw-bold text-secondary">Nombre de la Categoría *</label>
                                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                                           name="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
                                                    @error('nombre')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label small fw-bold text-secondary">Descripción</label>
                                                    <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                                              name="descripcion" rows="3">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                                                    @error('descripcion')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer bg-light border-top-0">
                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-sm text-white" style="background-color: #F97316;">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL ELIMINAR CATEGORÍA -->
                            <div class="modal fade" id="modalEliminar{{ $categoria->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content border-0 shadow">
                                        <div class="modal-body p-4 text-center">
                                            <i class="bi bi-exclamation-octagon text-danger display-4 d-block mb-2"></i>
                                            <h5 class="fw-bold mb-1">¿Estás seguro?</h5>
                                            <p class="text-muted small mb-4">Esta acción eliminará de forma permanente la categoría <strong>{{ $categoria->nombre }}</strong>.</p>

                                            <form action="{{ route('admin.categorias.destroy', $categoria->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <button type="button" class="btn btn-sm btn-light border px-3" data-bs-dismiss="modal">No, cancelar</button>
                                                    <button type="submit" class="btn btn-sm btn-danger px-3">Sí, eliminar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-5 text-muted">
                                    <i class="bi bi-tags display-6 d-block mb-3" style="color: #cbd5e1;"></i>
                                    No hay categorías registradas en el sistema.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL CREAR CATEGORÍA -->
<div class="modal fade" id="modalCrear" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header text-white" style="background-color: #1e293b;">
                <h5 class="modal-title fw-bold"><i class="bi bi-plus-circle-fill me-2"></i> Nueva Categoría</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.categorias.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Nombre de la Categoría *</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                               name="nombre" placeholder="Ej: Instrumental Quirúrgico" value="{{ old('nombre') }}" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label small fw-bold text-secondary">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror"
                                  name="descripcion" placeholder="Descripción adicional de la categoría..." rows="3">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-sm text-white" style="background-color: #F97316;">Guardar Categoría</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
