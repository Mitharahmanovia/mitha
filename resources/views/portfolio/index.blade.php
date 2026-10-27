
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary">Data Portofolio</h2>
            <p class="text-muted mb-0">Kelola karya dan project kamu di sini.</p>
        </div>
        <a href="{{ route('portofolio.create') }}" class="btn btn-primary">
            + Tambah Portofolio
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        @forelse($portofolios as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             class="card-img-top"
                             style="height:210px; object-fit:cover;"
                             alt="{{ $item->judul }}">
                    @else
                        <div class="bg-secondary-subtle d-flex align-items-center justify-content-center"
                             style="height:210px;">
                            <span class="text-muted">Belum ada gambar</span>
                        </div>
                    @endif

                    <div class="card-body">
                        <span class="badge bg-info text-dark">{{ $item->kategori }}</span>
                        <h5 class="card-title mt-2">{{ $item->judul }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 100) }}
                        </p>

                        @if($item->is_active)
                            <span class="badge bg-success">Include</span>
                        @else
                            <span class="badge bg-secondary">Exclude</span>
                        @endif
                    </div>

                    <div class="card-footer bg-white border-0 pb-3">
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ route('portofolio.edit', $item) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('portofolio.toggle', $item) }}"
                                  method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-outline-primary btn-sm">
                                    {{ $item->is_active ? 'Exclude' : 'Include' }}
                                </button>
                            </form>

                            <form action="{{ route('portofolio.destroy', $item) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus portofolio ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="bg-white rounded-3 shadow-sm text-center p-5">
                    <h5>Belum ada portofolio</h5>
                    <p class="text-muted">Klik tombol Tambah Portofolio untuk memulai.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>
