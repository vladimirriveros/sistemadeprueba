<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Lote;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
        // 1. Compras de Hoy
        // $comprasHoy = Compra::whereDate('created_at', today())->count();
        // $metaComprasDelDia = 20;
        // $porcentajeCompras = $metaComprasDelDia > 0 ? round(($comprasHoy / $metaComprasDelDia) * 100) : 0;

        // 2. Volumen de Lotes
        // $totalLotes = Lote::count();
        // $porcentajeLotes = $totalLotes > 0 ? min(round(($totalLotes / 100) * 100), 100) : 0;

        // 3. Total de Productos en Catálogo (SOLO ACTIVOS)
        // $totalProductos = Producto::where('estado', 1)->count();

        // 4. Obtener todos los lotes con sus productos (SOLO PRODUCTOS ACTIVOS)
        // $lotes = Lote::whereHas('producto', function($query) {
        //     $query->where('estado', 1);
        // })->with('producto')->get();

        // 5. Determinar la columna correcta de cantidad
        // $columnaCantidad = 'cantidad_actual';

        // 6. Agrupar la suma de cantidades por producto
        // $existenciasPorProducto = $lotes->groupBy('producto_id')->map(function ($grupo) use ($columnaCantidad) {
        //     return $grupo->sum($columnaCantidad);
        // });

        // 7. Calcular stock real SOLO para productos activos (estado = 1)
        // $productosSugeridos = Producto::where('estado', 1)
        //     ->get()
        //     ->map(function ($producto) use ($existenciasPorProducto) {
        //         $producto->stock_real = $existenciasPorProducto->get($producto->id, 0);
        //         return $producto;
        //     })
        //     ->filter(function ($producto) {
        //         return isset($producto->stock_minimo)
        //             && $producto->stock_minimo > 0
        //             && $producto->stock_real <= $producto->stock_minimo;
        //     })
        //     ->sortBy('stock_real')
        //     ->take(5);

        // 8. Contador de productos críticos
        // $productosCriticosCount = $productosSugeridos->count();

        // 9. Últimas Compras
        // $ultimasCompras = Compra::orderBy('created_at', 'desc')
        //     ->take(4)
        //     ->get();

        // return view('dashboard', compact(
        //     'comprasHoy',
        //     'metaComprasDelDia',
        //     'porcentajeCompras',
        //     'totalLotes',
        //     'porcentajeLotes',
        //     'totalProductos',
        //     'productosCriticosCount',
        //     'productosSugeridos',
        //     'ultimasCompras'
        // ));
    }
}
