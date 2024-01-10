@extends('layouts.mainlayout')

@section('title','Barang-delete')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <div class="delete">
    <h3 class="deleted">Apa benar ingin menghapus {{$barang->nama_barang }} dengan kode {{ $barang->kode_barang  }}?</h3>
        <div class="mt-5">
            <a href="/barang-destroy/{{ $barang->slug }}" class="btn btn-danger me-3">Tentu</a>
            <a href="/barang" class="btn btn-info">Batal</a>
        </div>
 </div>
  
@endsection
