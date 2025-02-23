<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Muestra lista de productos
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra el formulario para crear un nuevo producto
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Guarda un nuevo producto en la BD
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'descripcion'=> 'nullable|string',
            'precio'     => 'required|numeric|min:0',
            'stock'      => 'nullable|integer|min:0'
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')
            ->with('success','Producto creado correctamente.');
    }

    /**
     * Muestra un producto específico (opcional usar si lo requieres)
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', compact('producto'));
    }

    /**
     * Actualiza un producto en la BD
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'descripcion'=> 'nullable|string',
            'precio'     => 'required|numeric|min:0',
            'stock'      => 'nullable|integer|min:0'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()->route('productos.index')
            ->with('success','Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto de la BD
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('productos.index')
            ->with('success','Producto eliminado correctamente.');
    }
}
