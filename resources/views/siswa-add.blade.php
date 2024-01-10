@extends('layouts.mainlayout')

@section('title','siswa-add')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


<h1>Add New Data</h1>

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

    <form action="siswa-add" method="post">
        @csrf
        <div class="w-25">
            <label for="nis" class="form-label" >NIS</label>
            <input type="text" name="nis" id="nis" class="form-control" placeholder="NIS" value="{{ old('nis') }}">
        </div>
        <div class="w-25">
            <label for="nama" class="form-label" >Nama Siswa</label>
            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Siswa" value="{{ old('nama') }}">
        </div>
        <div class="mt-3  w-25">
            <label for="kelas" class="form-label" >Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="kelas" value="{{ old('kelas') }}">
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
