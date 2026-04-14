<?php

namespace App\Http\Controllers;
use App\Models\Paket;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    // ================= INDEX =================
    public function index()
    {
        $testimoni = Testimoni::with('user')->when(Auth::check(), function ($query) {
        $query->orderByRaw('user_id = ? DESC', [Auth::id()]);})->latest()->get();


        $sudahTestimoni = false;

        if (Auth::check() && Auth::user()->peran === 'user') {
            $sudahTestimoni = Testimoni::where('user_id', Auth::id())->exists();
        }

        // 🔥 RATA-RATA & JUMLAH
        $rataRata = Testimoni::avg('rating') ?? 0;
        $jumlahUser = Testimoni::count();

        return view('testimoni.index', compact(
            'testimoni',
            'sudahTestimoni',
            'rataRata',
            'jumlahUser'
        ));
    }

    // ================= CREATE =================
    public function create()
    {
        if (!Auth::check() || Auth::user()->peran !== 'user') {
            abort(403, 'Akses ditolak');
        }

        return view('testimoni.create');
    }

    // ================= STORE =================
    public function store(Request $request)
    {
        // 🔥 VALIDASI (FULL INDONESIA)
        $request->validate([
            'isi' => 'required|string|min:5|max:500',
            'rating' => 'required|integer|min:1|max:5'
        ], [
            'isi.required' => 'Isi testimoni wajib diisi.',
            'isi.min' => 'Isi testimoni minimal 5 karakter.',
            'isi.max' => 'Isi testimoni maksimal 500 karakter.',
            'rating.required' => 'Rating wajib dipilih.',
            'rating.min' => 'Rating minimal 1 bintang.',
            'rating.max' => 'Rating maksimal 5 bintang.',
        ]);

        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        if (Testimoni::where('user_id', Auth::id())->exists()) {
            return redirect()->route('testimoni.index')
                ->with('error', 'Kamu sudah pernah memberikan testimoni.');
        }

        Testimoni::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'isi' => $request->isi,
            'rating' => $request->rating,
        ]);

        return redirect()->route('testimoni.index')
            ->with('success', 'Testimoni berhasil ditambahkan.');
    }

    // ================= EDIT =================
    public function edit(Testimoni $testimoni)
    {
        if (!Auth::check() || $testimoni->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        return view('testimoni.edit', compact('testimoni'));
    }

    // ================= UPDATE =================
    public function update(Request $request, Testimoni $testimoni)
    {
        if (!Auth::check() || $testimoni->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }

        $request->validate([
            'isi' => 'required|string|min:10|max:500',
            'rating' => 'required|integer|min:1|max:5'
        ], [
            'isi.required' => 'Isi testimoni wajib diisi.',
            'isi.min' => 'Isi testimoni minimal 10 karakter.',
            'rating.required' => 'Rating wajib dipilih.',
        ]);

        $testimoni->update([
            'isi' => $request->isi,
            'rating' => $request->rating
        ]);

        return redirect()->route('testimoni.index')
            ->with('success', 'Testimoni berhasil diperbarui.');
    }


// ================= ADMIN DASHBOARD =================
public function dashboard()
{
    $totalPaket = Paket::count();
    $totalTestimoni = Testimoni::count();
    $rataRata = Testimoni::avg('rating') ?? 0;

    return view('admin.dashboard', compact(
        'totalPaket',
        'totalTestimoni',
        'rataRata'
    ));
}

// ================= ADMIN TESTIMONI =================
public function adminIndex()
{
    $testimoni = Testimoni::latest()->get();

    return view('admin.testimoni.index', compact('testimoni'));
}


    // ================= DELETE =================
    public function destroy(Testimoni $testimoni)
    {
        if (!Auth::check()) {
            abort(403, 'Akses ditolak');
        }

        if (Auth::user()->peran !== 'user') {
            abort(403, 'Admin tidak diperbolehkan menghapus testimoni.');
        }

        if ($testimoni->user_id !== Auth::id()) {
            abort(403, 'Ini bukan testimoni milik kamu.');
        }

        $testimoni->delete();

        return redirect()->route('testimoni.index')
            ->with('success', 'Testimoni berhasil dihapus.');
    }
}
