<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Ver todos los productos
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Formulario para crear
    public function create()
    {
        return view('productos.create');
    }

    // Guardar en la BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', '¡Creado con éxito!');
    }

    // Formulario para editar
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Actualizar en la BD
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', '¡Actualizado con éxito!');
    }

    // Borrar
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', '¡Eliminado!');
    }
}