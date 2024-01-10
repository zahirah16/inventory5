@extends('layouts.mainlayout')

@section('title','Rent Log')

@section('content')
    <h1>Data Peminjaman </h1>
    <div class="mt-5">
       <x-rent-table :rent='$rent' />
    </div>



@endsection
