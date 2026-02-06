<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    // tampil ke user
    public function index()
    {
        $testimoni = Testimoni::with('user')->latest()->get();
        return view('testimoni.index', compact('testimoni'));
    }

    // form tambah (user login)
    public function create()
    {
        if (auth()->user()->peran !== 'user') {
            abort(403);
        }
        return view('testimoni.create');
    }


    // simpan
    public function store(Request $request)
    {
        $request->validate([
            'isi' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

    // Cegah user bikin lebih dari 1 testimoni
    if (Testimoni::where('user_id', Auth::id())->exists()) {
        return redirect()->route('testimoni.index')
            ->with('error', 'Kamu sudah memberikan testimoni.');
    }
    

    Testimoni::create([
        'user_id' => Auth::id(),
        'nama' => Auth::user()->name,
        'isi' => $request->isi,
        'rating' => $request->rating,
    ]);

    return redirect()->route('testimoni.index')
        ->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit(Testimoni $testimoni)
    {
        if ($testimoni->user_id !== Auth::id()) {
            abort(403);
        }
    return view('testimoni.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        if ($testimoni->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'isi' => 'required',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $testimoni->update($request->only('isi', 'rating'));

        return redirect()->route('testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui');
    }

    // hapus (user pemilik testimoni)
    public function destroy(Testimoni $testimoni)
    {
        // HANYA USER BIASA
        if (Auth::user()->peran !== 'user') {
            abort(403, 'Admin tidak boleh menghapus testimoni');
        }

        // HANYA PEMILIK TESTIMONI
        if ($testimoni->user_id !== Auth::id()) {
            abort(403, 'Ini bukan testimoni kamu');
        }

        $testimoni->delete();

        return redirect()->route('testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus');
    }

}