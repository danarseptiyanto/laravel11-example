@extends('components.main')
@section('content')
    <h1>Detail</h1>
    <table>
        <tr>
            <td>Nama</td>
            <td>{{ $karyawan->nama }}</td>
        </tr>
        <tr>
            <td>jabatan</td>
            <td>{{ $karyawan->jabatan }}</td>
        </tr>
        <tr>
            <td>ttl</td>
            <td>{{ $karyawan->ttl }}</td>
        </tr>
        <tr>
            <td>status</td>
            <td>{{ $karyawan->status }}</td>
        </tr>
        <tr>
            <td>alamat</td>
            <td>{{ $karyawan->alamat }}</td>
        </tr>
        <tr>
            <td>mapel</td>
            <td>{{ $karyawan->mapel }}</td>
        </tr>
        <tr>
            <td>ijazah</td>
            <td>{{ $karyawan->ijazah }}</td>
        </tr>
        <tr>
            <td>niy</td>
            <td>{{ $karyawan->niy }}</td>
        </tr>
        <tr>
            <td>tglmasuk</td>
            <td>{{ $karyawan->tglmasuk }}</td>
        </tr>
        <tr>
            <td>tglmutasi</td>
            <td>{{ $karyawan->tglmutasi }}</td>
        </tr>
        <tr>
            <td>foto</td>
            <td><img style="width: 200px" src="/img/{{ $karyawan->foto }}"></td>
        </tr>
      </table>
      <a href="{{ route('homepage') }}"><button>Kembali</button></a><br>
      <a href="{{ route('detail.edit', ['id' => $karyawan->id]) }}"><button>Edit</button></a>
      <form action="{{ route('detail.delete', $karyawan->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button></a>
      </form>
@endsection