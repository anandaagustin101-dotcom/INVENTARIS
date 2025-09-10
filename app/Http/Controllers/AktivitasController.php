<?php

namespace App\Http\Controllers;
use App\Models\Aktivitas;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aktivitas = Aktivitas::orderBy('nama')->get();
        return view('pages.aktivitas.index', compact('aktivitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.aktivitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
        ]);

        Aktivitas::create($request->all());
        return redirect()->route('aktivitas.index')
        ->with('success', 'Data Aktivitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('pages.aktivitas.show', compact('aktivitas'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('pages.aktivitas.edit', compact('aktivitas'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'nama' => 'required',
            'jumlah' => 'required',
        ]);

        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update($request->all());
        return redirect()->route('aktivitas.index')
        ->with('success', 'Data Aktivitas berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();
        return redirect()->route('aktivitas.index')
        ->with('succes', 'Data Aktivitas berhasil dihapus');
    }
}