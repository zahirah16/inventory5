<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Inventory | @yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    {{-- style --}}

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <script src="{{ asset('js/search.js') }}"></script>


    <body>

        <div class="main d-flex flex-column justify-content-between">
            <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" >Inventory</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>

            <div class="body-content h-100">
                <div class="row g-0 h-100">
                    <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo02">
                        @if (Auth::user()->role_id == 1)
                            <a href="/dashboard" @if(request()->route()->uri == 'dashboard') class='active'@endif>Dashboard</a>

                            <a href="/barang"  @if(request()->route()->uri == 'barang' || request()->route()->uri == 'barang-add' || request()->route()->uri == 'barang-delete/{slug}' || request()->route()->uri == 'barang-edit/{slug}' ||  request()->route()->uri == 'barang-deleted-list/{slug}'  ) class='active'@endif>Barang</a>

                            {{-- <a href="/categories"  @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-delete/{slug}' || request()->route()->uri == 'category-edit/{slug}' ||  request()->route()->uri == 'category-deleted-list/{slug}') class='active'@endif>Categories</a> --}}

                            <a href="/guru"  @if(request()->route()->uri == 'guru') class='active'@endif>Data Guru</a>

                            <a href="/siswa"  @if(request()->route()->uri == 'siswa') class='active'@endif>Data Siswa</a>

                            {{-- <a href="/user"  @if(request()->route()->uri == 'user' || request()->route()->uri == 'registered-user' || request()->route()->uri == 'user-delete/{slug}' || request()->route()->uri == 'user-approve/{slug}' || request()->route()->uri == 'user-deleted' ) class='active'@endif>Pengguna</a> --}}

                            <a href="/item-rent"  @if(request()->route()->uri == 'item-rent') class='active'@endif>Pinjam</a>

                            {{-- <a href="/item-return"  @if(request()->route()->uri == 'item-return') class='active'@endif>Halaman Pengembalian</a> --}}

                            <a href="/logout" @if(request()->route()->uri == 'logout') class='active'@endif>Logout</a>
                        @else
                            <a href="/profile"  @if(request()->route()->uri == 'profile') class='active'@endif>Profile</a>

                            <a href="/logout"  @if(request()->route()->uri == 'logout') class='active'@endif>Logout</a>
                        @endif
                    </div>
                    <div class="content p-6 col-lg-10">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>