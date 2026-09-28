@extends('layouts.app')
@section('title', 'Edit | Portal Berita')
@section('content')
    <h1>Tambah Data</h1>
    <form action="{{ route('berita.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input class="form-control mb-3" type="text" name="judul" id="" placeholder="judul" required>
        <select class="form-control mb-3" name="kategori_id">
            <option value="">Pilih Kategori</option>
            @foreach ($kategori as $kategori)
                <option value="{{ $kategori->id}}">{{ $kategori->nama_kategori}}</option>
            @endforeach
        </select>
       <textarea class="form-control mb-3" name="isi" cols="30" rows="10"placeholder="isi" required></textarea>
        <input class="form-control mb-3"type="date" name="tgl"required>
        <input class="form-control mb-3"type="file" name="gambar" required>
        <input type="hidden" name="penulis" value="0">
        <button class="btn btn-primary form-control mb-2" type="submit">Submit Berita</button>
        <button class="btn btn-primary form-control mb-2" type="back">Kembali</button>
    </form>
@endsection