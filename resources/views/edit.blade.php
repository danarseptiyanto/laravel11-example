@extends('components.main')
@section('content')
<h1>Edit</h1>
<form action="{{ route('detail.edit', ['id' => $karyawan->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="nama" placeholder="nama" value="{{ $karyawan->nama }}"><br>
        @error('nama') <p>{{ $message }}</p> @enderror
    <input type="text" name="jabatan" placeholder="jabatan" value="{{ $karyawan->jabatan }}"><br>
        @error('jabatan') <p>{{ $message }}</p> @enderror
    <input type="text" name="ttl" placeholder="ttl" value="{{ $karyawan->ttl }}"><br>
        @error('ttl') <p>{{ $message }}</p> @enderror
    <select name="status">
        <option style="display: none" value="{{ $karyawan->status }}" selected>{{ $karyawan->status }}</option>
        <option value="Guru">Guru</option>
        <option value="Staff">Staff</option>
        <option value="Mutasi">Mutasi</option>
    </select><br>
        @error('status') <p>{{ $message }}</p> @enderror
    <input type="text" name="alamat" placeholder="alamat" value="{{ $karyawan->alamat }}"><br>
        @error('alamat') <p>{{ $message }}</p> @enderror
    <input type="text" name="mapel" placeholder="mapel" value="{{ $karyawan->mapel }}"><br>
        @error('mapel') <p>{{ $message }}</p> @enderror
    <input type="text" name="ijazah" placeholder="ijazah" value="{{ $karyawan->ijazah }}"><br>
        @error('ijazah') <p>{{ $message }}</p> @enderror
    <input type="text" name="niy" placeholder="niy" value="{{ $karyawan->niy }}"><br>
        @error('niy') <p>{{ $message }}</p> @enderror
    <input type="text" name="tglmasuk" placeholder="tglmasuk" value="{{ $karyawan->tglmasuk }}"><br>
        @error('tglmasuk') <p>{{ $message }}</p> @enderror
    <input type="text" name="tglmutasi" placeholder="tglmutasi" value="{{ $karyawan->tglmutasi }}"><br>
        @error('tglmutasi') <p>{{ $message }}</p> @enderror
        <img src="/img/{{ $karyawan->foto }}" alt=""><br>
    <input type="file" name="foto"><br>
        @error('foto') <p>{{ $message }}</p> @enderror
    <button type="submit">Edit</button>
</form>
@endsection