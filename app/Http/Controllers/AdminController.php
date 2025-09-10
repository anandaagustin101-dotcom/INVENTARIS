<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::orderBy('name', 'ASC')->get();
        return view('pages.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>($request->password),
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::find($id);
        return view('pages.admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = User::find($id);
        return view('pages.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $admin = User::find($id);
        $admin->name  = $request->name;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password =($request->password);
        }

        $admin->save();

        return redirect()->route('ubah-profil')
            ->with('success', 'Profil berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = User::find($id);
        $admin->delete();
        return redirect()->route('admin.index');
    }
}