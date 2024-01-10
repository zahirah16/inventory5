@extends('layouts.mainlayout')

@section('title','Barang-edit')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<h1>Edit Data</h1>



<div class="mt-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif

    <form action="/barang-edit/{{ $barang->slug }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="w-25">
            <label for="nama_barang" class="form-label" >Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" value="{{ $barang->nama_barang }}">
        </div>
        <div class="mt-3  w-25">
            <label for="kode_barang" class="form-label" >Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" value="{{$barang->kode_barang }}">
        </div>
        <div class="mt-3  w-25">
            <label for="category" class="form-label" >Kategori</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="currentCategory" class="form-label">Current Category</label>
            <ul>
                @foreach ($barang->categories as $category )
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
        <div class="mt-3  w-25">
            <label for="layak" class="form-label" >Jumlah Barang Layak</label>
            <input type="number" name="layak" id="layak" class="form-control" placeholder="2" value="{{ $barang->layak }}">
        </div> 
        <div class="mt-3  w-25">
            <label for="tidak_layak" class="form-label" >Jumlah Barang Tidak Layak</label>
            <input type="number" name="tidak_layak" id="tidak_layak" class="form-control" placeholder="1" value="{{$barang->tidak_layak}}">
        </div> 
        <div class="mt-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>


@endsection
