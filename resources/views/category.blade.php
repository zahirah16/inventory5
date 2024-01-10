@extends('layouts.mainlayout')

@section('title','Dashboard')

@section('content')

    <h1>Halaman Kategori</h1>

    <div class="mt-5 d-flex justify-content-end">
    </div>
    
        <div class="mt-5 d-flex justify-content-end">
            <a href="category-add" class="btn btn-primary me-3">Tambah Data</a>
            <a href="category-deleted" class="btn btn-secondary">Lihat Kategori Terhapus</a>
        </div>

        <div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }} 
                </div>
            @endif 
        </div>
        
    
        <div class=" tabel my-5">
            <table class=" table table-bordered " >
                <thead class="kepala">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
            
                    @foreach ($categories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                            <td>
                                <a href="category-edit/{{ $item->slug }}" class="btn btn-warning">edit</a>
                                <a href="category-delete/{{ $item->slug }}" class="btn btn-danger">delete</a>
                            </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        

       
@endsection