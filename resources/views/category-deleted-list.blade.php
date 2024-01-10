@extends('layouts.mainlayout')

@section('title','Category Deleted')

@section('content')
    <h1>Data Kategori Terhapus</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/categories" class="btn btn-primary me-3">Kembali</a>
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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categoryDeleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                            <td>
                                <a href="category-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
