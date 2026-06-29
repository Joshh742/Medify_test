@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Kategori</h2>
    <p><strong>Nama:</strong> {{ $kategori->nama }}</p>
    <p><strong>Kode:</strong> {{ $kategori->kode }}</p>

    <hr>
    <h4>List Item dalam Kategori Ini:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Item</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori->masterItems as $item)
            <tr>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
            </tr>
            @endforeach
        </tbody>

        <a href="{{ url('kategori-items/export-pdf/'.$kategori->id) }}" class="btn btn-danger">
    Download PDF
        </a>
    </table>
</div>
@endsection