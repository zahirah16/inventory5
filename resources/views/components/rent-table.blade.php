
<div class="mt-5 d-flex justify-content-end">
    <a href="item-rent" class="btn btn-primary me-3">Peminjaman</a>
    {{-- <a href="back" class="btn btn-warning me-3">Kembalikan</a> --}}
</div>

<div class="bord mt-4">

    <table class="table">
        <thead class="dash">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Kelas</th>
                <th>Guru</th>
                <th>Barang</th>
                <th>Tambahan</th>
                <th>Rent Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $rent as $item )
            <tr class="{{ $item->return_date == null ? '' : 'text-bg-success' }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->user_id }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->guru->name }}</td>
                {{-- <td>
                    @if (is_string($item->guru))
                        {{ $item->guru }}
                    @else
                        {{ $item->guru->name }}
                    @endif
                </td> --}}
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->tambahan }}</td>
                <td>{{ $item->rent_date }}</td>
                <td>{{ $item->return_date }}</td>
                <td>{{ $item->status }}</td>
                <td>    <a href="/back/{{ $item->slug }}" class="btn btn-warning me-3">Kembalikan</a>                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
</div>
