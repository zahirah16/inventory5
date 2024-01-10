@extends('layouts.mainlayout')

@section('title','siswa-delete')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <div class="delete">
    <h3 class="deleted">Apa benar ingin menghapus {{$siswa->nama }} dengan nis {{ $siswa->nis  }}?</h3>
        <div class="mt-5">
            <a href="/siswa-destroy/{{ $siswa->slug }}" class="btn btn-danger me-3">Tentu</a>
            <a href="/siswa" class="btn btn-info">Batal</a>
        </div>
 </div>
  
@endsection