@extends('dashboard.dashboard')

@section('content')
<h2>Tambah kelas</h2>

<form action="{{ url('/Mahasiswa') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Kode Matkul</label>
        <input type="text" name="kode_matkul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Nama Kelas</label>
        <input type="text" name="nama_matkul" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>sks</label>
        <input type="text" name="sks" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
</form>
@endsection