<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Biologo;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $areas = Area::where('nome', 'like', '%'.$search.'%')->orWhere('descricao', 'like', '%'.$search.'%')->paginate(10);
        //$areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $biologos = Biologo::all();
        return view('areas.create', compact('biologos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'responsavel_id' => 'nullable|exists:biologos,id',
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Área criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $area = Area::findOrFail($id);
        return view('areas.show', compact('area'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $biologos = Biologo::all();
        return view('areas.edit', compact('area', 'biologos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'responsavel_id' => 'nullable|exists:biologos,id',
        ]);

        $area = Area::findOrFail($id);
        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'Área atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área excluída com sucesso!');
    }
}
