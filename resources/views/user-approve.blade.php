@extends('layouts.mainlayout')

@section('title','User Approve')

@section('content')
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 <div class="delete">
    <h3 class="deleted">Are you sure want to Approve {{$user->username}} ?</h3>
        <div class="mt-5">
            <a href="/approved/{{ $user->slug }}" class="btn btn-warning me-3">Sure</a>
            <a href="/registered-user" class="btn btn-info">Back</a>
        </div>
 </div>
  
@endsection
