<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pertanyaan Berhasil Dikirim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            max-width: 700px;
            width: 90%;
            box-sizing: border-box;
        }
        h1 { color: #4295f5; }
        .question {
            background: #f5f7f9;
            padding: 20px;
            border-left: 5px solid #4295f5;
            border-radius: 8px;
            margin: 25px 0;
        }
        .btn {
            display: inline-block;
            background: #4295f5;
            color: white;
            padding: 13px 20px;
            border-radius: 7px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Terima Kasih, {{ $nama }}! 🎉</h1>
        <p>Pertanyaan Anda telah berhasil dikirim.</p>

        <div class="question">
            <strong>Pertanyaan Anda:</strong>
            <p>{{ $pertanyaan }}</p>
        </div>

        <p>
            Pertanyaan Anda akan segera kami tanggapi
            melalui email <strong>{{ $email }}</strong>.
        </p>

        <p>Mohon cek kotak masuk atau folder spam Anda secara berkala.</p>

        <a href="{{ url('/') }}" class="btn">Kembali ke Beranda</a>
    </div>
</body>
</html>
