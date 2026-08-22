<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Cliente::orderBy('nombre')->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->validate([
            'dpi' => 'required|max:13',
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:15',
            'direccion' => 'required|max:255',
            'nit' => 'required|max:20',
        ]);
        Cliente::create($datos);
        return redirect()->route('clientes.index')->with('mensaje', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $datos = $request->validate([
            'dpi' => 'required|max:13',
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'email' => 'required|email|max:100',
            'telefono' => 'required|max:15',
            'direccion' => 'required|max:255',
            'nit' => 'required|max:20',
        ]);
        $cliente->update($datos);
        return redirect()->route('clientes.index')->with('mensaje', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index')->with('mensaje', 'Cliente eliminado correctamente.');
    }
}
