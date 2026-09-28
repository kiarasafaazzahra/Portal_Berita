@extends('layouts.app')
@section('title', 'Dashboard | Portal Berita')
@section('content')

<h2>Data Berita</h2>

<form action="{{ route('berita.index')}}" method="GET">
    <input class="form-control mb-3" type="text" name="search" value="{{ request('search')}}" placeholder="Cari Judul......">
    <button type="submit" class="btn btn-primary">
        Cari
    </button>
    <a href="{{ route('berita.index')}}" class="btn btn-secondary">
        Tampilkan Semua
    </a>
</form>
<div class="row col-md-12 pt-3">

<a href="{{ route('berita.create')}}" class="btn btn-primary mb-2">Buat Berita</a>
<a href="/" class="btn btn-primary mb-2">Kembali</a>
<table class="table table-bordered">
<tr class="table-primary">
    <th>Judul</th>
    <th>tgl</th>
    <th>kategori</th>
    <th>gambar</th>
    <th>aksi</th>
</tr>
@foreach($berita as $b)
<tr>
    <td>{{ $b->judul}}</td>
    <td>{{ $b->tgl}}</td>
    <td>{{ $b->kategori->nama_kategori }}</td>
    <td><img src="{{ url('storage/'. $b->gambar) }}" alt="" height="50px"></td>
            <td>
                <a class="btn btn-primary" href="{{ url('/berita/'.$b->id) }}">Detail</a>
                <a class="btn btn-warning" href="{{ route('berita.edit', $b->id) }}">Edit</a>
                <form class="d-inline" action="{{ route('berita.destroy', $b->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Yakin dihapus?')">
                </form>
            </td>
        </tr>
        @endforeach
</table>
</div>
    {{ $berita->links('pagination::bootstrap-5')}}
@endsection

    