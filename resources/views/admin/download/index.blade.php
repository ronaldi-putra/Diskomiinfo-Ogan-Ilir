@extends('layouts.admin.master')
@section('judul','Download')
@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>@yield('judul')</h4>
        <a href="{{ route('download.create') }}" class="btn btn-sm btn-primary">Tambah File</a>
    </div>
    <div class="card-body">
        @if (session('sukses'))
        <div class="alert alert-success">
            {{ session('sukses') }}
        </div>
        @endif
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">No Katalog</th>
                    <th scope="col">No Publikasi</th>
                    <th scope="col">ISSN / ISBN</th>
                    <th scope="col">Tgl Publikasi</th>
                    <th scope="col">File</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($download as $d => $hasil)
                <tr>
                    <th scope="row">{{ $d + $download->firstitem() }}</th>
                    <td>{{ $hasil->judul }}</td>
                    <td>{{ $hasil->no_katalog }}</td>
                    <td>{{ $hasil->no_publikasi }}</td>
                    <td>{{ $hasil->issn }}</td>
                    <td>{{ $hasil->tgl_publikasi }}</td>
                    <td>{{ $hasil->file }}</td>
                    <td>
                        <form action="{{ route('download.destroy', $hasil->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Apakah yakin ingin menghapus!')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $download->links() }}
    </div>
</div>

@endsection