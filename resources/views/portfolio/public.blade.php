
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV dan Portofolio Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#beranda">CV dan Portofolio Saya</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                <li class="nav-item"><a class="nav-link" href="#pendidikan">Pendidikan</a></li>
                <li class="nav-item"><a class="nav-link" href="#keahlian">Keahlian</a></li>
                <li class="nav-item"><a class="nav-link" href="#portofolio">Portofolio</a></li>
            </ul>
        </div>
    </div>
</nav>

<section id="beranda" class="bg-white py-5">
    <div class="container py-4">
        <div class="row align-items-center g-4">
            <div class="col-md-8">
                <p class="text-primary fw-semibold mb-2">MAHASISWA TEKNIK INFORMATIKA</p>

                <h1 class="display-5 fw-bold">Mitha Rahma Novia</h1>

                <h4 class="text-secondary">Mahasiswa | Web Developer Pemula</h4>

                <p class="text-secondary mt-3">
                    Saya adalah mahasiswa yang tertarik pada teknologi,
                    pemrograman web, desain, dan pengembangan aplikasi.
                    Saya terus belajar untuk meningkatkan kemampuan dan
                    menghasilkan karya yang bermanfaat.
                </p>

                <a href="#portofolio" class="btn btn-primary mt-2">
                    Lihat Project Saya
                </a>
            </div>

            <div class="col-md-4 text-center">
                <div class="rounded-circle bg-primary-subtle d-inline-flex
                            align-items-center justify-content-center"
                     style="width:180px;height:180px;">
                    <span class="display-1 text-primary fw-bold">M</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tentang" class="container py-5">
    <h2 class="fw-bold mb-3">Tentang Saya</h2>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p class="mb-0">
                Saya senang mempelajari hal baru di bidang teknologi informasi,
                terutama pembuatan website, pengolahan database, dan desain.
                Saya ingin mengembangkan keterampilan melalui tugas kuliah,
                praktikum, dan berbagai project.
            </p>
        </div>
    </div>
</section>

<section id="pendidikan" class="bg-white py-5">
    <div class="container">
        <h2 class="fw-bold mb-4">Pendidikan dan Pengalaman</h2>

        <div class="card border-0 shadow-sm mb-3">
            <div class="card-body p-4">
                <h5 class="fw-bold">Pendidikan Perguruan Tinggi</h5>
                <p class="text-primary mb-1">Teknik Informatika</p>
                <p class="text-secondary mb-0">
                    Isi nama kampus, tahun masuk, dan informasi pendidikan kamu di sini.
                </p>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="fw-bold">Organisasi dan Pengalaman</h5>
                <p class="text-secondary mb-0">
                    Tambahkan pengalaman organisasi, kepanitiaan, pelatihan,
                    atau pengalaman lain yang pernah kamu ikuti.
                </p>
            </div>
        </div>
    </div>
</section>

<section id="keahlian" class="container py-5">
    <h2 class="fw-bold mb-4">Keahlian</h2>

    <div class="d-flex flex-wrap gap-2">
        <span class="badge text-bg-primary p-3">HTML</span>
        <span class="badge text-bg-primary p-3">CSS</span>
        <span class="badge text-bg-primary p-3">Bootstrap</span>
        <span class="badge text-bg-primary p-3">PHP</span>
        <span class="badge text-bg-primary p-3">Laravel</span>
        <span class="badge text-bg-primary p-3">Database SQL</span>
        <span class="badge text-bg-primary p-3">Blender</span>
    </div>
</section>

<section id="portofolio" class="bg-white py-5">
    <div class="container">
        <h2 class="fw-bold mb-2">Portofolio Project</h2>
        <p class="text-secondary mb-4">
            Beberapa karya dan project yang pernah saya buat.
        </p>

        <div class="row g-4">
            @forelse($portofolios as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}"
                                 class="card-img-top"
                                 alt="{{ $item->judul }}"
                                 style="height:220px;object-fit:cover;">
                        @else
                            <div class="bg-light d-flex align-items-center
                                        justify-content-center"
                                 style="height:220px;">
                                <span class="text-secondary">Belum ada gambar</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <span class="badge text-bg-info">
                                {{ $item->kategori }}
                            </span>

                            <h5 class="fw-bold mt-2">{{ $item->judul }}</h5>

                            <p class="text-secondary">
                                {{ $item->deskripsi }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-secondary">
                        Belum ada project yang ditampilkan.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="container py-5" id="kontak">
    <h2 class="fw-bold mb-3">Kontak</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <p>Email: Mitha rahma novia@gmail.com</p>
            <p>Telepon: 081234567890</p>
            <p class="mb-0">Alamat: Jakarta, Indonesia</p>
        </div>
    </div>
</section>

<footer class="bg-primary text-white text-center py-3">
    <p class="mb-0">&copy; 2026 Mitha Rahma Novia | CV dan Portofolio</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
