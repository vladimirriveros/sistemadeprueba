<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255|unique:categorias',
                'descripcion' => 'nullable|string',
            ]);

            $categoria = Categoria::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion
            ]);

            // Si la petición espera JSON (desde el modal de productos)
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'categoria' => [
                        'id' => $categoria->id,
                        'nombre' => $categoria->nombre,
                        'descripcion' => $categoria->descripcion
                    ],
                    'message' => 'Categoría creada exitosamente'
                ]);
            }

            // Si es una petición normal (desde el index de categorías)
            return redirect()->route('admin.categorias.index')->with('success', 'Categoría creada correctamente.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error de validación',
                    'errors' => $e->errors()
                ], 422);
            }
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al crear la categoría: ' . $e->getMessage()
                ], 500);
            }
            return redirect()->back()->with('error', 'Error al crear la categoría: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('success', 'Categoría eliminada correctamente.');
    }
}
