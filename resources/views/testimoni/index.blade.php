@extends('layouts.app')

@section('content')

<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Testimoni Pelanggan</h3>
            <p class="text-muted mb-0">
                Apa kata pelanggan tentang <img src="{{ asset('image/logo panjang 2.png') }}" alt="JoyTravel" width="60" height="20px">
            </p>
        </div>

        @auth
            @if(auth()->user()->peran === 'user' && !$sudahTestimoni)
                <a href="{{ route('testimoni.create') }}"
                   class="btn btn-primary rounded-pill px-4">
                    + Tambah Testimoni
                </a>
            @endif
        @endauth
    </div>

    <!-- NOTIFIKASI -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-warning alert-dismissible fade show">
            {{ session('error') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @auth
        @if(auth()->user()->peran === 'user' && $sudahTestimoni && !session('success'))
            <div class="alert alert-info alert-dismissible fade show">
                Kamu sudah memberikan testimoni. Terima kasih 🙏
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    @endauth


    <!-- ⭐ RATING -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 text-center">

        <h1 class="fw-bold mb-0">
            {{ number_format($rataRata, 1) }}
        </h1>

        @php
            $full = floor($rataRata);
            $half = ($rataRata - $full) >= 0.5 ? 1 : 0;
            $empty = 5 - $full - $half;
        @endphp

        <div class="text-warning fs-4 mb-2">
            @for($i = 0; $i < $full; $i++)
                <i class="bi bi-star-fill"></i>
            @endfor

            @if($half)
                <i class="bi bi-star-half"></i>
            @endif

            @for($i = 0; $i < $empty; $i++)
                <i class="bi bi-star"></i>
            @endfor
        </div>

        <p class="text-muted mb-0">
            dari {{ $jumlahUser }} ulasan
        </p>
    </div>

    <!-- LIST TESTIMONI -->
    <div class="row g-4">
        @foreach($testimoni as $t)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">
                <div class="card-body p-4 d-flex flex-column">

                    <h6 class="fw-bold">{{ $t->nama }}</h6>

                    <!-- BINTANG PER USER -->
                    <div class="text-warning mb-2">
                        @for($i = 0; $i < $t->rating; $i++)
                            <i class="bi bi-star-fill"></i>
                        @endfor
                    </div>

                    <p class="text-muted flex-grow-1">
                        “{{ $t->isi }}”
                    </p>

                    @auth
                        @if(auth()->id() === $t->user_id)
                            <form action="{{ route('testimoni.destroy', $t->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded-pill">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    @endauth

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
