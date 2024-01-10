@extends('layouts.mainlayout')

@section('title','Siswa')

@section('content')
    <h1>Data Siswa</h1>
    <div class="my-5 d-flex justify-content-end">
    </div>
    
        <div class="mt-5 d-flex justify-content-end">
            <a href="/siswa-add" class="btn btn-primary me-3">Siswa Baru</a>
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
                        <th>Nis</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr> 
                </thead>
                <tbody>
            
                @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>
                            
                            <a href="/siswa-delete/{{ $item->slug }}" class="btn btn-danger">delete</a>
                        </td>
                </tr>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
@endsection