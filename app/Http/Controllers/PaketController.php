<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaketGambar;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    // ================= USER LIST =================
    public function userIndex()
    {
        $paket = Paket::with('galeri')->latest()->get();
        return view('paket.user', compact('paket'));
    }

    // ================= ADMIN LIST =================
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
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',
            
            'gambar' => 'required|array|min:1',

            'map_embed' => 'nullable|array',
            'map_embed.*' => 'nullable|string|max:5000',
        ]);


        $paket = Paket::create([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // 🔥 SIMPAN GAMBAR + MAP
        if ($request->hasFile('gambar')) {

            foreach ($request->file('gambar') as $i => $file) {

                if (!$file) continue;
                if (!$file->isValid()) continue;

                // 🔥 VALIDASI MANUAL
                $ext = strtolower($file->getClientOriginalExtension());
                if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                    return back()
                        ->withErrors(['gambar' => 'Semua gambar harus JPG / PNG'])
                        ->withInput();
                }

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
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'required|string',

            'gambar' => 'nullable|array',
            'gambar.*' => 'image|mimes:jpg,jpeg,png|max:2048',

            'map_embed' => 'nullable|array',
            'map_embed.*' => 'nullable|string|max:5000',
        ]);

        $paket->update([
            'nama_paket' => $request->nama_paket,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);

        // 🔥 UPDATE MAP EMBED UNTUK SEMUA GALERI
        if ($request->map_embed) {
            foreach ($paket->galeri as $i => $gambar) {
                $gambar->update([
                    'map_embed' => $request->map_embed[$i] ?? $gambar->map_embed
                ]);
            }
        }

        // 🔥 TAMBAH GAMBAR BARU
        if ($request->hasFile('gambar')) {
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
        // 🔥 OPTIONAL: hapus semua gambar juga
        foreach ($paket->galeri as $galeri) {
            // Storage::delete('public/' . $galeri->gambar); // aktifkan kalau mau hapus file juga
            $galeri->delete();
        }

        $paket->delete();

        return back()->with('success', 'Paket berhasil dihapus!');
    }
}
