<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Katalog {{ $jenis }} Tahun {{ $tahun }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            font-size: 18px;
            margin: 0;
            text-transform: uppercase;
        }
        .header h2 {
            font-size: 16px;
            margin: 5px 0;
            color: #333;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }
        .no {
            width: 30px;
            text-align: center;
        }
        .judul {
            width: 35%;
        }
        .ditetapkan {
            width: 80px;
            text-align: center;
        }
        .diundangkan {
            width: 80px;
            text-align: center;
        }
        .status {
            width: 60px;
            text-align: center;
        }
        .keterangan {
            width: 15%;
        }
        .footer {
            margin-top: 30px;
            font-size: 10px;
            text-align: right;
            color: #666;
        }
        .status-berlaku {
            color: green;
            font-weight: bold;
        }
        .status-tidak-berlaku {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Katalog Produk Hukum</h1>
        <h2>{{ $jenis }} Tahun {{ $tahun }}</h2>
    </div>

    <div class="info">
        <p><strong>Jenis Peraturan:</strong> {{ $jenis }}</p>
        <p><strong>Tahun:</strong> {{ $tahun }}</p>
        <p><strong>Total Dokumen:</strong> {{ $total }} dokumen</p>
        <p><strong>Tanggal Cetak:</strong> {{ $tanggal_cetak }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="no">No</th>
                <th class="judul">Judul</th>
                <th class="ditetapkan">Tanggal Ditetapkan</th>
                <th class="diundangkan">Tanggal Diundangkan</th>
                <th class="status">Status</th>
                <th class="keterangan">Keterangan Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dokumen as $index => $doc)
            <tr>
                <td class="no">{{ $index + 1 }}</td>
                <td class="judul">
                    <strong>{{ $doc->kategori_nama }} Nomor {{ $doc->no_peraturan }} Tahun {{ $doc->tahun_diundang }}</strong><br>
                    {{ strip_tags($doc->content) }}
                </td>
                <td class="ditetapkan">
                    @if($doc->tgl_ditetap)
                        {{ \Carbon\Carbon::parse($doc->tgl_ditetap)->format('d/m/Y') }}
                    @else
                        -
                    @endif
                </td>
                <td class="diundangkan">
                    @if($doc->tgl_diundang)
                        {{ \Carbon\Carbon::parse($doc->tgl_diundang)->format('d/m/Y') }}
                    @else
                        -
                    @endif
                </td>
                <td class="status">
                    @if($doc->status == 1)
                        <span class="status-berlaku">Berlaku</span>
                    @else
                        <span class="status-tidak-berlaku">Tidak Berlaku</span>
                    @endif
                </td>
                <td class="keterangan">
                    @if($doc->status == 1)
                        Masih berlaku dan dapat digunakan sebagai dasar hukum
                    @else
                        @if(isset($doc->abstrak) && $doc->abstrak)
                            Status: Tidak berlaku - {{ strip_tags($doc->abstrak) }}
                        @else
                            Sudah tidak berlaku atau dicabut
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis pada {{ $tanggal_cetak }}</p>
        <p>JDIH (Jaringan Dokumentasi dan Informasi Hukum)</p>
    </div>
</body>
</html>
