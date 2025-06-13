@extends('dashboard.dashboard')

@section('content')
<h2>Data matkul</h2>

<a href="{{ url('/mahasiswa/create') }}" class="btn btn-primary mb-3">Tambah mahasiswa</a>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Kode mahasiswa</th>
            <th>Nama mahasiswa</th>
            <th>sks</th>
            <th>Aksi</th>
            <th>Cetak</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($mahasiswa as $m)
                        <tr>
                            <td>{{ $m['kode_mahasiswa'] }}</td>
                            <td>{{ $m['nama_mahasiswa'] }}</td>
                            <td>{{ $m['sks'] }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $m['kode_mahasiswa']) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('mahasiswa.destroy', $m['kode_mahasiswa']) }}" method="POST" style="display:inline;">
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