@extends('dashboard.dashboard')

@section('content')
<h2>Data matkul</h2>

<a href="{{ url('/matkul/create') }}" class="btn btn-primary mb-3">Tambah Matkul</a>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode matkul</th>
            <th>Nama matkul</th>
            <th>sks</th>
            <th>Aksi</th>
            <th>Cetak</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($matkul as $m)
                        <tr>
                            <td>{{ $m['kode_matkul'] }}</td>
                            <td>{{ $m['nama_matkul'] }}</td>
                            <td>{{ $m['sks'] }}</td>
            <td>
                <a href="{{ url('/matkul/'.$m['kode_matkul'].'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ url('/matkul/'.$m['kode_matkul']) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection