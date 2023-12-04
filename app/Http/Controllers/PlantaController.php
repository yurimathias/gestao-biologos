<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Planta;

class PlantaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $plantas = Planta::where('nome_cientifico', 'like', '%'.$search.'%')->orWhere('nome_comum', 'like', '%'.$search.'%')->paginate(10);
        //$plantas = Planta::all();
        return view('plantas.index', compact('plantas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('plantas.create', \compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome_cientifico' => 'required',
            'nome_comum' => 'required',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        Planta::create($request->all());

        return redirect()->route('plantas.index')->with('success', 'Planta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $planta = Planta::findOrFail($id);
        return view('plantas.show', compact('planta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $planta = Planta::findOrFail($id);
        $areas = Area::all();
        return view('plantas.edit', compact('planta', 'areas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_cientifico' => 'required',
            'nome_comum' => 'required',
            'area_id' => 'nullable|exists:areas,id',
        ]);

        $planta = Planta::findOrFail($id);
        $planta->update($request->all());

        return redirect()->route('plantas.index')->with('success', 'Planta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $planta = Planta::findOrFail($id);
        $planta->delete();

        return redirect()->route('plantas.index')->with('success', 'Planta excluída com sucesso!');
    }
}
