<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $katalog->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 40px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
        }
        .header h1 {
            font-size: 20px;
            margin: 0;
            text-transform: uppercase;
        }
        .info {
            margin-bottom: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .info h2 {
            margin-top: 0;
            color: #333;
        }
        .info p {
            margin: 10px 0;
        }
        .note {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            margin-top: 30px;
            border-radius: 5px;
        }
        .footer {
            margin-top: 50px;
            font-size: 12px;
            text-align: center;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Katalog Produk Hukum</h1>
    </div>

    <div class="info">
        <h2>Informasi Katalog</h2>
        <p><strong>Nama Katalog:</strong> {{ $katalog->name }}</p>
        <p><strong>Tahun:</strong> {{ $katalog->tahun }}</p>
        <p><strong>Tanggal Cetak:</strong> {{ $tanggal_cetak }}</p>
    </div>

    <div class="note">
        <p><strong>Catatan:</strong></p>
        <p>Ini adalah katalog manual yang telah disiapkan sebelumnya. Untuk mengakses dokumen lengkap dalam katalog ini, silakan download file katalog yang tersedia di sistem JDIH.</p>
        <p>File katalog berisi detail lengkap produk hukum dengan format yang telah ditentukan sesuai standar JDIH.</p>
    </div>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis pada {{ $tanggal_cetak }}</p>
        <p>JDIH (Jaringan Dokumentasi dan Informasi Hukum)</p>
    </div>
</body>
</html>
