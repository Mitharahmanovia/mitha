<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Biodata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5" style="max-width: 760px">
    <div class="card border-0 shadow-sm"><div class="card-body p-4">
        <h2>Edit Biodata</h2>
        <p class="text-secondary">Perbarui data mahasiswa.</p>
        @if($errors->any())
            <div class="alert alert-danger">Periksa kembali data yang kamu isi.</div>
        @endif
        <form action="{{ route('biodata.update', $biodata->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.biodata._form')
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('biodata.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div></div>
</main>
</body>
</html>
