<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Data Barang</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $index => $barang)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $barang->nama_barang_222291 }}</td>
                    <td>{{ $barang->kategori->nama_kategori_222291 ?? '-' }}</td>
                    <td>{{ $barang->jumlah_222291 }}</td>
                    <td>{{ $barang->lokasi_222291 }}</td>
                    <td>{{ $barang->kondisi_222291 }}</td>
                    <td>{{ $barang->tanggal_masuk_222291 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
