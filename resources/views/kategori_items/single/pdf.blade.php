<!DOCTYPE html>
<html>
<head>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Nama Kategori: {{ $kategori->nama }}</h2> <p>Kode Kategori: {{ $kategori->kode }}</p>    <h4>Daftar Item:</h4> <table>
        <thead>
            <tr><th>Nama Item</th><th>Harga</th></tr>
        </thead>
        <tbody>
            @foreach($kategori->masterItems as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ number_format($item->harga_beli) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="position: fixed; bottom: 0; font-size: 10px;">
        Dicetak pada: {{ date('d-m-Y H:i:s') }}
    </div>
</body>
</html>