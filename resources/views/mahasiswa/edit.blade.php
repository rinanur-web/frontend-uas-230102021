@extends('dashboard.dashboard')

@section('content')
<h2>Edit Mahasiswa</h2>

<form action="{{ url('/mahasiswa/' . $matkul['kode_matkul']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Kode Mahasiswa</label>
        <input type="text" name="kode_matkul" value="{{ $matkul['kode_matkul'] }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Nama matkul</label>
        <input type="text" name="nama_matkul" value="{{ $matkul['nama_matkul'] }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>sks</label>
        <input type="text" name="sks" value="{{ $matkul['sks'] }}" class="form-control">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection