@extends('layouts.mainlayout')

@section('title', 'pengembalian') 

@section('content')
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

<div class="col-12 col-md-6 offset-md-2 col-lg-6 offset-md-3">
    <h1 class="mt-5">Pengembalian Barang</h1>

    <div>
        @if (session('message'))
            <div class="alert {{session('alert-class')}}">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <form action="back" method="post">
        @csrf

        <div class="mt-5">
            <label for="user_id" class="form-label">Nama Peminjam</label>
            <input type="text" name="user_id" id="user_id" class="form-control" placeholder="user_id" value="{{ $back->user_id }}" readonly>
        </div>
        <div class="mt-3  ">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="kelas" value="{{ $back->kelas }}" readonly>
        </div>
        <div class="mt-3">
            <label for="id_guru" class="form-label">Nama Guru</label>
            <input type="text" name="id_guru" id="id_guru" class="form-control" placeholder="id_guru" value="{{ $back->id_guru }}  {{ $back->guru->name }}" readonly>
        </div>
        <div class="mt-3 ">
            <label for="id_barang" class="form-label">Barang</label>
            <input type="text" name="id_barang" id="id_barang" class="form-control" placeholder="id_barang" value="{{ $back->id_barang }} {{ $back->barang->nama_barang }}" readonly>
        </div>
        <div class="mt-3">
            <label for="tambahan" class="form-label">Tambahan</label>
            <input type="text" name="tambahan" id="tambahan" class="form-control" placeholder="tambahan" value="{{ $back->tambahan }}" readonly>
        </div>
        <div class="mt-5">
            <button type="submit" class="btn btn-primary w-100">Kembalikan</button>
        </div>
    </form>
</div>

{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.box').select2();
    });
</script> --}}
@endsection
