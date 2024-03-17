@extends('components.main')
@section('content')
<h1>Create</h1>
<form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nama" placeholder="nama"><br>
        @error('nama') <p>{{ $message }}</p> @enderror
    <input type="text" name="jabatan" placeholder="jabatan"><br>
        @error('jabatan') <p>{{ $message }}</p> @enderror
    <input type="text" name="ttl" placeholder="ttl"><br>
        @error('ttl') <p>{{ $message }}</p> @enderror
    <select name="status">
        <option value="Guru">Guru</option>
        <option value="Staff">Staff</option>
        <option value="Mutasi">Mutasi</option>
    </select><br>
        @error('status') <p>{{ $message }}</p> @enderror
    <input type="text" name="alamat" placeholder="alamat"><br>
        @error('alamat') <p>{{ $message }}</p> @enderror
    <input type="text" name="mapel" placeholder="mapel"><br>
        @error('mapel') <p>{{ $message }}</p> @enderror
    <input type="text" name="ijazah" placeholder="ijazah"><br>
        @error('ijazah') <p>{{ $message }}</p> @enderror
    <input type="text" name="niy" placeholder="niy"><br>
        @error('niy') <p>{{ $message }}</p> @enderror
    <input type="text" name="tglmasuk" placeholder="tglmasuk"><br>
        @error('tglmasuk') <p>{{ $message }}</p> @enderror
    <input type="text" name="tglmutasi" placeholder="tglmutasi"><br>
        @error('tglmutasi') <p>{{ $message }}</p> @enderror
    <input type="file" name="foto"><br>
        @error('foto') <p>{{ $message }}</p> @enderror
    <button type="submit">Tambah</button>
</form>
@endsection