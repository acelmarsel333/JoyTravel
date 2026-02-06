@extends('layouts.app')

@section('content')

<div class="container">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Testimoni Pelanggan</h3>
            <p class="text-muted mb-0">
                Apa kata mereka tentang JoyTravel
            </p>
        </div>

        @auth
            @if(auth()->user()->peran === 'user')
                <a href="{{ route('testimoni.create') }}"
                   class="btn btn-primary fw-semibold rounded-pill px-4">
                    + Tambah Testimoni
                </a>
            @endif
        @endauth
    </div>

    <!-- LIST TESTIMONI -->
    <div class="row g-4">

        @foreach($testimoni as $t)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm rounded-4">

                <div class="card-body p-4 d-flex flex-column">

                    <!-- NAMA -->
                    <h6 class="fw-bold mb-1">{{ $t->nama }}</h6>

                    <!-- RATING -->
                    <div class="text-warning mb-2">
                        {{ str_repeat('⭐', $t->rating) }}
                    </div>

                    <!-- ISI -->
                    <p class="text-muted flex-grow-1">
                        “{{ $t->isi }}”
                    </p>

                    <!-- AKSI -->
                    @auth
                        @if(auth()->user()->peran === 'user' && auth()->id() === $t->user_id)
                            <form action="{{ route('testimoni.destroy', $t->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus testimoni ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm rounded-pill px-3">
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
