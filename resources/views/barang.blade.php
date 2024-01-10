@extends('layouts.mainlayout')

@section('title','Barang')

@section('content')
    <h1>Data Barang</h1>
 
    <form action="" method="get">
        <div class="row input-group ">
            <div class="col-12 col-sm-4"></div>
            <div class="col-12 col-sm-2"></div>
            <div class="col-12 col-sm-3">
                <div class="input-group mb-3">
                    <input type="text" name="nama_barang" class="form-control" placeholder="Cari barang"  aria-describedby="badic-addon2">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
            <div class=" col-12 col-sm-3 ">
                <div class="input-group">
                    <select name="category" id="category" class="form-control">
                        <option value="">Select Category</option>
                        
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            
                        @endforeach
                        
                    </select>
                    <div class="">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
                
                
            </div>


        </div>
    </form> 

<div class="mt-5 d-flex justify-content-end">
    <a href="barang-add" class="btn btn-primary me-3">Tambah Data</a>
    <a href="barang-deleted" class="btn btn-secondary">Lihat Data Terhapus</a>
</div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
           {{ session('status') }} 
        </div>
        
    @endif
    </div>

    <div class="tabel my-5">
        <table class="table ">
            <thead class="kepala">
                <tr >
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Merek</th>
                    <th rowspan="2">Kode</th>
                    <th rowspan="2">Kategori</th>
                    <th colspan="2">Kondisi</th>
                    <th rowspan="2">Jumlah</th>
                    {{-- <th rowspan="2">Status</th> --}}
                    <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th>Layak</th>
                    <th>Tidak Layak</th>
                </tr>
            </thead> 
            <tbody>
                @foreach ($isibarang as $item)
                
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>
                            @foreach ( $item->categories as $category)
                                {{ $category->name }} <br>
                            @endforeach
                            
                        </td>
                        
                        <td>{{ $item->layak }}</td>
                        <td>{{ $item->tidak_layak }}</td>
                        <td>
                            {{ $item->jumlah_barang }}
                        </td>
                        {{-- <td>{{ $item->status }}</td> --}}
                            <td>
                                <a href="/barang-edit/{{ $item->slug }}" class="btn btn-warning">edit</a>
                                <a href="/barang-delete/{{ $item->slug }}" class="btn btn-danger">delete</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
