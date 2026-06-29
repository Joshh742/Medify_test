@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Daftar Kategori Items</h3>
        </div>
        <div class="card-body">
            @include('kategori_items.index.filter')
            
            @include('kategori_items.index.table')
        </div>
    </div>
</div>
@endsection

@section('js')
    @include('kategori_items.index.js')
@endsection