@extends('layouts.mainlayout')

@section('title','Dashboard')

@section('content')

    <h1>Welcome, {{ Auth::user()->username }}</h1>
    
    <div class="row pilihan mt-5" >
        
        <a href="/barang">
        <div class="col-lg-3" >
            <div class="card-data barang">
                <a href="/barang">
                <div class="row">
                    <div class="col-6 d-flex flex-column  align-items-end"><i class="bi bi-cast"></i></div>
                    <div class="col-6 d-flex flex-column  ">
                        <div class="card-desc">Barang</div>
                        <div class="card-count align-items-">{{ $barang_Count }}</div>
                    </div>
                </div>
            </a>
            </div>
        </div> 
        
        <div class="col-lg-3">
            <div class="card-data guru">
                <a href="/guru">
                <div class="row">
                    <div class="col-6 d-flex flex-column  align-items-end"><i class="bi bi-person"></i></div>
                    <div class="col-6 d-flex flex-column ">
                        <div class="card-desc">Guru</div>
                        <div class="card-count align-items-">{{ $guru_Count }}</div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-data guna">
                <a href="/user">
                <div class="row">
                    <div class="col-6 d-flex flex-column  align-items-end"><i class="bi bi-people"></i></div>
                    <div class="col-6 d-flex flex-column  ">
                        <div class="card-desc">Siswa</div>
                        <div class="card-count align-items-">{{ $guna_Count }}</div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card-data pinjam">
                <a href="/dashboard">
                <div class="row">
                    <div class="col-6 d-flex flex-column  align-items-end"><i class="bi bi-arrow-left-right"></i></div>
                    <div class="col-6 d-flex flex-column  ">
                        <div class="card-desc">Peminjaman</div>
                        <div class="card-count align-items-">{{ $rent_Count }}</div>
                    </div>
                </div>
            </a>
            </div>
        </div>
       
    </div>  

    <div class="mt-5">
        <x-rent-table :rent='$rent' />
     </div>
        
       
    


@endsection 