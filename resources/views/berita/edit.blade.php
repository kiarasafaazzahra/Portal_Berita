@extends('layouts.app')
@section('title', 'Edit Berita | Portal Berita')
@section('content')

    <h2>Edit Berita</h2>

    <form action="{{ route('berita.update', $berita->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input class="form-control mb-3" type="text" name="judul_berita" value="{{ $berita->judul_berita }}" placeholder="Judul" required>
        <select class="form-control mb-3" name="kategori_id" required>
            <option value="" disabled>-- Pilih Kategori --</option>

            @foreach ($kategori as $kategori)
                <option
                    value="{{ $kategori->id }}"
                    {{ $berita->kategori_id == $kategori->id ? 'selected' : '' }} >
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>

        <textarea class="form-control mb-3" name="isi_berita" cols="30" rows="10" placeholder="Isi berita" required>{{ $berita->isi_berita }}</textarea>

        <input class="form-control mb-3" type="date" name="tgl" value="{{ $berita->tgl }}" required >

        @if ($berita->gbr)
            <p class="text-muted small mb-1">  File saat ini: <strong>{{ $berita->gbr }}</strong></p>
        @endif
        <input class="form-control mb-3" type="file" name="gbr" id="image"  >
        <button class="btn btn-primary form-control" type="submit"> Edit Berita</button>
    </form>

@endsection
