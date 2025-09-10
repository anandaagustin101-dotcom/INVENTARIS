<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class DataBarangController extends Controller
{
    public function index()
    {
        $databarang = Barang::with('aktivitas')
            ->when(request('tanggal'), function ($query, $tanggal) {
                $query->whereDate('created_at', $tanggal);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.databarang.index', compact('databarang'));
    }

    public function show(string $id)
    {
        $databarang = Barang::with('aktivitas')->findOrFail($id);
        return view('pages.databarang.show', compact('databarang'));
    }
}