
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold text-primary mb-2">Edit Portofolio</h2>
                    <p class="text-muted mb-4">Perbarui informasi project kamu.</p>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('portofolio.update', $portofolio) }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Judul Project</label>
                            <input type="text" name="judul" class="form-control"
                                   value="{{ old('judul', $portofolio->judul) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control"
                                   value="{{ old('kategori', $portofolio->kategori) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"
                                      required>{{ old('deskripsi', $portofolio->deskripsi) }}</textarea>
                        </div>

                        @if($portofolio->gambar)
                            <div class="mb-3">
                                <label class="form-label">Gambar Saat Ini</label><br>
                                <img src="{{ asset('storage/'.$portofolio->gambar) }}"
                                     alt="{{ $portofolio->judul }}"
                                     class="img-thumbnail mb-2"
                                     style="max-width: 250px; max-height: 180px; object-fit: cover;">
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Ganti Gambar (opsional)</label>
                            <input type="file" name="gambar" class="form-control"
                                   accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                            <small class="text-muted">Format JPG, PNG, atau WEBP, maksimal 2 MB.</small>
                        </div>

                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox"
                                   name="is_active" value="1" id="is_active"
                                   @checked(old('is_active', $portofolio->is_active))>
                            <label class="form-check-label" for="is_active">
                                Tampilkan di halaman publik (Include)
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('portofolio.index') }}"
                               class="btn btn-outline-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
