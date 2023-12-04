<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Area;
use App\Models\Biologo;
use App\Models\Planta;
use Illuminate\Http\Request;
use App\Models\Relatorio;
use App\Models\RelatorioAnimal;
use App\Models\RelatorioPlanta;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $relatorios = Relatorio::where('biologo_id', 'like', '%'.$search.'%')->orWhere('area_id', 'like', '%'.$search.'%')->paginate(10);
        //$relatorios = Relatorio::all();
        return view('relatorios.index', compact('relatorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $biologos = Biologo::all();
        $areas = Area::all();
        $animais = Animal::all();
        $plantas = Planta::all();
        return view('relatorios.create', compact('biologos', 'areas', 'animais', 'plantas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'biologo_id' => 'required|exists:biologos,id',
            'area_id' => 'required|exists:areas,id',
            'observacoes' => 'required',
        ]);

        $create = Relatorio::create($request->all());

        if ($request->animal_id) {
            foreach ($request->animal_id as $key => $value) {
                RelatorioAnimal::create(['relatorio_id' => $create->id, 'animal_id' => $value]);
            }
        }

        if ($request->planta_id) {
            foreach ($request->planta_id as $key => $value) {
                RelatorioPlanta::create(['relatorio_id' => $create->id, 'planta_id' => $value]);
            }
        }

        return redirect()->route('relatorios.index')->with('success', 'Relatório criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        return view('relatorios.show', compact('relatorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $biologos = Biologo::all();
        $areas = Area::all();
        $animais = Animal::all();
        $plantas = Planta::all();
        return view('relatorios.edit', compact('relatorio', 'biologos', 'areas', 'animais', 'plantas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'biologo_id' => 'required|exists:biologos,id',
            'area_id' => 'required|exists:areas,id',
            'observacoes' => 'required',
        ]);

        $relatorio = Relatorio::findOrFail($id);
        $relatorio->update($request->all());

        $relatorio->animais()->sync($request->animal_id);
        
        $relatorio->plantas()->sync($request->planta_id);

        return redirect()->route('relatorios.index')->with('success', 'Relatório atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $relatorio = Relatorio::findOrFail($id);
        $relatorio->delete();

        return redirect()->route('relatorios.index')->with('success', 'Relatório excluído com sucesso!');
    }
}
