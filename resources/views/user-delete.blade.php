@extends('layouts.mainlayout')

@section('title','User-delete')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <div class="delete">
    <h3 class="deleted">Apa benar ingin menghapus {{$user->username}} ?</h3>
        <div class="mt-5">
            <a href="/user-destroy/{{ $user->slug }}" class="btn btn-danger me-3">Tentu</a>
            <a href="/user" class="btn btn-info">Batal</a>
        </div>
 </div>
  
@endsection
