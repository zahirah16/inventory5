@extends('layouts.mainlayout')
 
@section('title','Item Rent')

@section('content')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


        

    <div class="col-12 col-md-6 offset-md-2 col-lg-6 offset-md-3">
        <h1 class="mt-5">Peminjaman Barang</h1>

        <div>
            @if (session('message'))
                <div class="alert {{session('alert-class')}}">
                    {{ session('message') }} 
                </div>
            @endif 
        </div>

        <form action="item-rent" method="post"> 
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">Nama Siswa</label>
                <select name="user_id" id="user" class="form-control ">
                    <option value=""></option>
                    @foreach ($siswa as $item)
                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" required readonly>
            </div>
            <div class="mb-3">
                <label for="guru" class="form-label">Nama Guru</label>
                <select name="id_guru" id="guru" class="form-control ">
                    <option value="" ></option>
                    @foreach ($guru as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="barang" class="form-label">Barang</label>
                <select name="id_barang" id="barang" class="form-control box" >
                    <option value="" ></option>
                    @foreach ($barang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_barang }}  {{ $item->kode_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" mb-3">
                <label for="tambahan" class="form-label" >Tambahan</label>
                <input type="text" name="tambahan" id="tambahan" class="form-control" placeholder="HDMI, VGA, Terminal" value="{{ old('tambahan') }}">
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>
    
    
{{-- 
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function() {
        $('.box').select2();
    });
</script> --}}
{{-- <script>
    $(document).ready(function() {
        $('.box').select2();

        document.getElementById('user').addEventListener('change', function() {
            var selectedNama = this.value;

            // Lakukan permintaan AJAX untuk mendapatkan informasi kelas
            axios.get('/get-kelas/' + selectedNama)
                .then(function(response) {
                    document.getElementById('kelas').value = response.data.kelas;
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    });
</script> --}}
{{-- @push('scripts')
    <script>
        document.getElementById('user').addEventListener('change', function() {
            var selectedNama = this.value;

            // Lakukan permintaan AJAX untuk mendapatkan informasi kelas
            axios.get('/get-kelas/' + selectedNama)
                .then(function(response) {
                    if (response.data.kelas) {
                        document.getElementById('kelas').value = response.data.kelas;
                    } else {
                        console.error('Siswa tidak ditemukan atau kelas tidak tersedia.');
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    </script>
@endpush --}}

{{-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.box').select2();
    });
</script>

@stack('scripts')
@push('scripts')
    <script>
        document.getElementById('user').addEventListener('change', function() {
    var selectedNama = this.value;

    // Lakukan permintaan AJAX untuk mendapatkan informasi kelas
    axios.get('/get-kelas/' + selectedNama)
        .then(function(response) {
            if (response.data.kelas) {
                document.getElementById('kelas').value = response.data.kelas;
            } else {
                console.error('Siswa tidak ditemukan atau kelas tidak tersedia.');
            }
        })
        .catch(function(error) {
            console.error(error);
        });
});

    </script>
@endpush --}}
<!-- Sebelumnya di akhir halaman -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk elemen 'user'
        $('#user').select2();
        $('#guru').select2();
        $('#barang').select2();

        // Tambahkan event listener pada perubahan nilai elemen 'user'
        $('#user').on('change', function() {
            var selectedNama = $(this).val();

            // Lakukan permintaan AJAX untuk mendapatkan informasi kelas
            axios.get('/get-kelas/' + selectedNama)
                .then(function(response) {
                    if (response.data.kelas) {
                        $('#kelas').val(response.data.kelas);
                    } else {
                        console.error('Siswa tidak ditemukan atau kelas tidak tersedia.');
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
        });
    });
</script>




@endsection