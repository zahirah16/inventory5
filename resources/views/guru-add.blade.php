@extends('layouts.mainlayout')

@section('title','Guru-add')

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

    <form action="guru-add" method="post">
        @csrf
        <div class="w-25">
            <label for="nip" class="form-label" >NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="{{ old('nip') }}">
        </div>
        <div class="w-25">
            <label for="name" class="form-label" >Nama Guru</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nama Guru" value="{{ old('name') }}">
        </div>
        <div class="mt-3  w-25">
            <label for="mapel" class="form-label" >Mata Pelajaran</label>
            <input type="text" name="mapel" id="mapel" class="form-control" placeholder="mapel" value="{{ old('mapel') }}">
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
