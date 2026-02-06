<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    // ================= ADMIN =================

    public function index()
    {
        $paket = Paket::latest()->get();
        return view('admin.paket.index', compact('paket'));
    }

    public function create()
    {
        return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_paket' => 'required|string',
            'harga'      => 'required|numeric',
            'deskripsi'  => 'required|string',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('paket', 'public');
        }

        Paket::create($data);

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
        return view('admin.paket.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $data = $request->validate([
            'nama_paket' => 'required|string',
            'harga'      => 'required|numeric',
            'deskripsi'  => 'required|string',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($paket->gambar) {
                Storage::disk('public')->delete($paket->gambar);
            }

            $data['gambar'] = $request->file('gambar')
                ->store('paket', 'public');
        }

        $paket->update($data);

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil diupdate');
    }

    public function destroy(Paket $paket)
    {
        if ($paket->gambar) {
            Storage::disk('public')->delete($paket->gambar);
        }

        $paket->delete();

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil dihapus');
    }

    // ================= USER =================

    public function userIndex()
    {
        $paket = Paket::latest()->get();
        return view('paket.user', compact('paket'));
    }

    public function show(Paket $paket)
    {
        return view('paket.show', compact('paket'));
    }
}
