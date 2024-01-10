@extends('layouts.mainlayout')

@section('title','Category-add')

@section('content')

<h1>Tambah Data Baru</h1>

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

    <form action="category-add" method="post">
        @csrf
        <div class="w-25">
            <label for="name" class="form-label" >Nama Barang</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
        </div>

        <div class="mt-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
</div>

@endsection
