@extends('layouts.mainlayout')

@section('title','Guru')

@section('content')
    <h1>Data Guru</h1>
    <div class="my-5 d-flex justify-content-end">
    </div>
    
        <div class="mt-5 d-flex justify-content-end">
            <a href="/guru-add" class="btn btn-primary me-3">Guru Baru</a>
        </div>

        <div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }} 
                </div>
            @endif 
        </div> 
        
    
        <div class=" tabel my-5">
            <table class="table table-bordered">
                <thead class="kepala">
                    <tr>
                        <th>No.</th>
                        <th>Nip</th>
                        <th>Nama Guru</th>
                        <th>Mata Pelajaran</th>
                    </tr> 
                </thead>
                <tbody>
            
                @foreach ($isiguru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->mapel }}</td>

                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
@endsection