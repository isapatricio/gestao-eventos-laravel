<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Palestra;
use Barryvdh\DomPDF\Facade\Pdf;

class PalestraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $estado = $request->query('estado');
        $local = $request->query('local');

        $query = \App\Models\Palestra::query();

        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($local) {
            $query->where('local', 'like', '%' . $local . '%');
        }

        // Paginar 5 por página (ou o número que quiseres)
        $palestras = $query->orderBy('data_hora', 'asc')->paginate(5);

        // Manter filtros na paginação
        $palestras->appends([
            'estado' => $estado,
            'local' => $local,
        ]);

        return view('palestras.index', compact('palestras', 'estado', 'local'));
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
        $palestra = \App\Models\Palestra::findOrFail($id);
        return view('palestras.edit', compact('palestra'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'data_hora' => 'required|date',
        'local' => 'required|string|max:255',
        'palestrante' => 'required|string|max:255',
        'estado' => 'required|in:agendada,realizada,cancelada',
    ]);

        $palestra = \App\Models\Palestra::findOrFail($id);
        $palestra->update($request->all());

        return redirect()->route('palestras.index')->with('success', 'Palestra atualizada com sucesso!');
        }

    /**
     * Remove the specified resource from storage.
     */
    public function exportarPDF()
{
        $palestras = \App\Models\Palestra::orderBy('data_hora')->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('palestras.pdf', compact('palestras'));

        return $pdf->download('palestras.pdf'); // ← abrir diretamente no navegador
    }
    public function destroy(string $id)
    {
        $palestra = \App\Models\Palestra::findOrFail($id);
    $palestra->delete();

    return redirect()->route('palestras.index')->with('success', 'Palestra eliminada com sucesso!');

    }
}
