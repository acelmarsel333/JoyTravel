<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaketGambar;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function userIndex()
    {
        $paket = Paket::with('galeri')->latest()->get();
        return view('paket.user', compact('paket'));
    }

    // ================= LIST =================
    public function index()
    {
        $paket = Paket::with('galeri')->latest()->get();
        return view('admin.paket.index', compact('paket'));
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin.paket.create');
    }

    // ================= DETAIL =================
    public function show(Paket $paket)
    {
        $paket->load('galeri');
        return view('paket.show', compact('paket'));
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        // 🔥 VALIDASI
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'map_embed.*' => 'nullable|string'
        ]);

        $paket = Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->file('gambar')) {
            foreach ($request->file('gambar') as $i => $file) {

                $path = $file->store('paket', 'public');

                PaketGambar::create([
                    'paket_id' => $paket->id,
                    'gambar' => $path,
                    'map_embed' => $request->map_embed[$i] ?? null
                ]);
            }
        }

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil ditambahkan!');
    }

    // ================= EDIT =================
    public function edit(Paket $paket)
    {
        $paket->load('galeri');
        return view('admin.paket.edit', compact('paket'));
    }

    // ================= UPDATE =================
    public function update(Request $request, Paket $paket)
    {
        // 🔥 VALIDASI
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            'gambar.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'map_embed.*' => 'nullable|string'
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // 🔥 UPDATE MAP TANPA UPLOAD GAMBAR
        if ($request->map_embed) {
            $firstImage = $paket->galeri()->first();

            if ($firstImage) {
                $firstImage->update([
                    'map_embed' => $request->map_embed[0] ?? $firstImage->map_embed
                ]);
            }
        }

        // 🔥 TAMBAH GAMBAR BARU
        if ($request->file('gambar')) {
            foreach ($request->file('gambar') as $i => $file) {

                $path = $file->store('paket', 'public');

                PaketGambar::create([
                    'paket_id' => $paket->id,
                    'gambar' => $path,
                    'map_embed' => $request->map_embed[$i] ?? null
                ]);
            }
        }

        return redirect()->route('admin.paket.index')
            ->with('success', 'Paket berhasil diedit!');
    }

    // ================= DELETE =================
    public function destroy(Paket $paket)
    {
        $paket->delete();

        return back()->with('success', 'Paket berhasil dihapus!');
    }
}
