@extends('components.main')
@section('content')
    <h1>Homepage</h1>
    @if(session('success'))
      {{ session('success') }}
    @endif
    <form action="{{ route('homepage') }}" method="GET">
      <div style="display: flex;">
      <input style="width: 100%" type="search" name="search" value="{{ $search ?? '' }}" placeholder="Search...">
      <button type="submit">Search</button>
      </div>
    </form> 
    @if(isset($search))
      <p>Search result for {{ $search }}</p>
    @endif
    @guest
        <p>Login untuk bisa menambahkan guru</p>
    @endguest
    <h3>Guru</h3> 
    <table>
        <tr>
          <th style="width: 30px">No</th>
          <th>Nama</th>
          <th>Status</th>
          <th style="width: 60px">Aksi</th>
        </tr>
        @foreach ($karyawanGuru as $index => $karyawan)
        <tr>
          <td style="width: 30px">{{ $index + 1 }}</td>
          <td>{{ $karyawan->nama }}</td>
          <td>{{ $karyawan->status }}</td>
          <td style="width: 60px"><a href="detail/{{ $karyawan->id }}">Detail</a></td>
        </tr>
        @endforeach
      </table>
	  <form action="{{ route('homepage.exportcsv') }}" method="POST">
        @csrf
    	<input type="hidden" name="status" value="Guru">
        <button type="submit">Export CSV Guru</button>
      </form>
      <h3>Staff</h3>
      <table>
        <tr>
          <th style="width: 30px">No</th>
          <th>Nama</th>
          <th>Status</th>
          <th style="width: 60px">Aksi</th>
        </tr>
        @foreach ($karyawanStaff as $index => $karyawan)
        <tr>
          <td style="width: 30px">{{ $index + 1 }}</td>
          <td>{{ $karyawan->nama }}</td>
          <td>{{ $karyawan->status }}</td>
          <td style="width: 60px"><a href="detail/{{ $karyawan->id }}">Detail</a></td>
        </tr>
        @endforeach
      </table>
	  <form action="{{ route('homepage.exportcsv') }}" method="POST">
        @csrf
    	<input type="hidden" name="status" value="Staff">
        <button type="submit">Export CSV Staff</button>
      </form>
      <h3>Guru & Staff Mutasi</h3>
      <table>
        <tr>
          <th style="width: 30px">No</th>
          <th>Nama</th>
          <th>Status</th>
          <th style="width: 60px">Aksi</th>
        </tr>
        @foreach ($karyawanMutasi as $index => $karyawan)
        <tr>
          <td style="width: 30px">{{ $index + 1 }}</td>
          <td>{{ $karyawan->nama }}</td>
          <td>{{ $karyawan->status }}</td>
          <td style="width: 60px"><a href="detail/{{ $karyawan->id }}">Detail</a></td>
        </tr>
        @endforeach
      </table>
	  <form action="{{ route('homepage.exportcsv') }}" method="POST">
        @csrf
    	<input type="hidden" name="status" value="Mutasi">
        <button type="submit">Export CSV Mutasi</button>
      </form>
      {{-- <a href="{{ route('homepage.exportcsv', ['status' => 'Guru']) }}">Export CSV</a> --}}
@endsection
