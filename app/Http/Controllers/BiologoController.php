<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biologo;

class BiologoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $biologos = Biologo::where('nome', 'like', '%'.$search.'%')->orWhere('especialidade', 'like', '%'.$search.'%')->paginate(10);
        //$biologos = Biologo::all();
        return view('biologos.index', compact('biologos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('biologos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'especialidade' => 'nullable',
        ]);

        Biologo::create($request->all());

        return redirect()->route('biologos.index')->with('success', 'Biólogo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $biologo = Biologo::findOrFail($id);
        return view('biologos.show', compact('biologo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $biologo = Biologo::findOrFail($id);
        return view('biologos.edit', compact('biologo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'especialidade' => 'nullable',
        ]);

        $biologo = Biologo::findOrFail($id);
        $biologo->update($request->all());

        return redirect()->route('biologos.index')->with('success', 'Biólogo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $biologo = Biologo::findOrFail($id);
        $biologo->delete();

        return redirect()->route('biologos.index')->with('success', 'Biólogo excluído com sucesso!');
    }
}
