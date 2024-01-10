@extends('layouts.mainlayout')

@section('title','Category-edit')

@section('content')

<h1>Edit Data</h1>

<div class="mt-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        
    @endif

    <form action="/category-edit/{{ $category->slug }}" method="post">
        @csrf
        @method('put')
        <div class="w-25">
            <label for="name" class="form-label" >Nama Kategori</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Nama Kategori">
        </div>

        <div class="mt-3">
            <button class="btn btn-warning" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection
 