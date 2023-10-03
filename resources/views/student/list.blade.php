@extends('layouts.main')

@section('content')

    <h2>Daftar Siswa</h2>
    
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Nik</th>
            <th scope="col">Gender</th>
            <th scope="col">Birth</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($students as $index => $std)
          <tr>
            <th scope="row">{{ $index+1 }}</th>
            <td>{{ $std->nama }}</td>
            <td>{{ $std->nik }}</td>
            <td>{{ $std->gender }}</td>
            <td>{{ $std->birth }}</td>
          </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Data is empty</td>
            </tr>
        @endforelse
        </tbody>
      </table>
    
@endsection
