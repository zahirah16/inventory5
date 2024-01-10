@extends('layouts.mainlayout')

@section('title','User Baru')

@section('content')
    <h1>Data User Baru</h1>

    <div class="my-5 d-flex justify-content-end">
    </div>
    
        <div class="mt-5 d-flex justify-content-end">
            <a href="/user" class="btn btn-primary me-3">Approved User List</a>
        </div>

        <div>
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
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($registeredUsers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->kelas }}</td>
                                <td>{{ $item->status }}</td>
                                    <td>
                                        <a href="/user-approve/{{ $item->slug }}"class="btn btn-info">Approve</a>
                                    </td>
                            </tr>
                        @endforeach
                    
                    
                </tbody>
            </table>
        </div>
@endsection