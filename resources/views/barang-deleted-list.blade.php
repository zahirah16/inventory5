@extends('layouts.mainlayout')

@section('title','Barang Deleted')

@section('content')
    <h1>Data Barang Terhapus</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/barang" class="btn btn-primary me-3">Kembali</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
           {{ session('status') }} 
        </div>
        
    @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Kondisi</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangDeleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->kondisi_barang }}</td>
                        <td>{{ $item->jumlah_barang }}</td>
                        <td>{{ $item->status }}</td>
                            <td>
                                <a href="/barang-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
