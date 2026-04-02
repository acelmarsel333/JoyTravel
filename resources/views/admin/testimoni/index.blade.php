@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                <i class="bi bi-chat-quote-fill text-primary me-2"></i>
                Data Testimoni
            </h4>
            <p class="text-muted mb-0">
                Berikut adalah testimoni yang diberikan oleh pelanggan kami.
            </p>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="20%">Nama Pelanggan</th>
                            <th>Isi Testimoni</th>
                            <th width="15%">Rating</th>
                            {{-- <th width="15%">Tanggal</th> --}} {{-- Uncomment jika ada kolom created_at --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($testimoni as $t)
                        <tr>
                            <td class="fw-medium">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="fw-medium">{{ $t->nama }}</span>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 text-muted fst-italic">
                                    "{{ $t->isi }}"
                                </p>
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $t->rating)
                                            <i class="bi bi-star-fill text-warning fs-5"></i>
                                        @else
                                            <i class="bi bi-star text-secondary fs-5"></i>
                                        @endif
                                    @endfor
                                    <span class="ms-2 text-muted small">({{ $t->rating }})</span>
                                </div>
                            </td>
                            {{-- <td>{{ $t->created_at ? $t->created_at->format('d M Y') : '-' }}</td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="bi bi-chat-quote display-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">Belum ada testimoni</h5>
                                    <p class="text-muted mb-0">Testimoni pelanggan akan muncul di sini setelah ada yang mengirimkan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 text-muted small">
        Total Testimoni: <strong>{{ $testimoni->count() }}</strong>
    </div>
</div>
@endsection