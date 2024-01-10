@extends('layouts.mainlayout')

@section('title','Category-delete')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <div class="delete">
    <h3 class="deleted">Apa benar ingin menghapus {{$category->name}} ?</h3>
        <div class="mt-5">
            <a href="/category-destroy/{{ $category->slug }}" class="btn btn-danger me-3">Tentu</a>
            <a href="/categories" class="btn btn-info">Batal</a>
        </div>
 </div>
  
@endsection
