<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palestra;

class PalestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $palestras = Palestra::orderBy('data_hora', 'asc')->get();
        return view('palestras.index', compact('palestras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('palestras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'data_hora' => 'required|date',
        'local' => 'required|string|max:255',
        'palestrante' => 'required|string|max:255',
        'estado' => 'required|in:agendada,realizada,cancelada',
    ]);
    // Guardar os dados
    \App\Models\Palestra::create($request->all());

    // Redirecionar para a lista
    return redirect()->route('palestras.index')->with('success', 'Palestra criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
