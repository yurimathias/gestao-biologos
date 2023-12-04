<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Area;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $animais = Animal::where('nome_cientifico', 'like', '%'.$search.'%')->orWhere('nome_comum', 'like', '%'.$search.'%')->paginate(10);
        //$animais = Animal::all();
        return view('animais.index', compact('animais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = Area::all();
        return view('animais.create', compact('areas'));
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

        Animal::create($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animais.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        $areas = Area::all();
        return view('animais.edit', compact('animal', 'areas'));
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

        $animal = Animal::findOrFail($id);
        $animal->update($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();

        return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');
    }
}
