@extends('layouts.mainlayout')

@section('title','User Deleted')

@section('content')
    <h1>Data User Terhapus</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="/user" class="btn btn-primary me-3">Kembali</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
        <div class="alert alert-success">
           {{ session('status') }} 
        </div>
        
    @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nis</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userDeleted as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->kelas }}</td>
                            <td>
                                <a href="user-restore/{{ $item->slug }}" class="btn btn-warning">Pulihkan</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
