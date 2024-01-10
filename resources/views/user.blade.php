@extends('layouts.mainlayout')

@section('title','User')

@section('content')
    <h1>Data User</h1>

    <div class="my-5 d-flex justify-content-end">
    </div>

        <div class="mt-5 d-flex justify-content-end">
            <a href="/registered-user" class="btn btn-primary me-3">User Baru</a>
            <a href="user-deleted" class="btn btn-secondary">Lihat User Terhapus</a>
        </div>

        <div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <div class="tabel my-5">
            <table class="table table-bordered">
                <thead class="kepala">
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nis</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->kelas }}</td>

                        <td>
                            {{-- <a href="/user-detail/{{ $item->slug }}" class="btn btn-warning">detail</a> --}}
                            <a href="user-delete/{{ $item->slug }}" class="btn btn-danger">delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
@endsection
