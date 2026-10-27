<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('biodata.index') }}">CRUD Biodata 1115</a>
    </div>
</nav>
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2>Data Biodata Mahasiswa</h2>
            <p class="text-secondary mb-0">Kelola data biodata mahasiswa.</p>
        </div>
        <a href="{{ route('biodata.create') }}" class="btn btn-primary">+ Tambah Biodata</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-primary">
                <tr>
                    <th>No.</th><th>NIM</th><th>Nama</th><th>Program Studi</th>
                    <th>Email</th><th>No. HP</th><th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @forelse($biodata as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nim }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->prodi }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp ?? '-' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('biodata.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('biodata.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-4">Belum ada data biodata.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>
</html>
