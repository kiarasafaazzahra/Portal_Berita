@extends('layouts.app')

@section('title', 'Home | Portal Berita')

@section('content')

  <div class="text-center mb-5">
    <h1>Selamat Datang di Portal Berita</h1>
    <p class="text-muted">Temukan berbagai berita terbaru dan informasi terkini di sini.</p>
  </div>

  <div class="row row-cols-md-3 g-3">

    @foreach ($beritas as $berita)

      <div class="col">
        <div class="card shadow-sm">
          <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" style="border-radius: 5px" >
          <div class="card-body">
            <h2>{{ $berita->judul}}</h2>
            <p> {{ Str::limit($berita->isi, 100, '...') }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a href="{{ url('/berita/' . $berita->id) }}" class="btn btn-sm btn-outline-secondary">Selengkapnya...</a>
              </div>
              <small class="text-body-secondary">{{ $berita->tgl }}</small>
            </div>
          </div>
        </div>
      </div>

    @endforeach

  </div>


    <div class="text-center mb-5 mt-5">
    <h1>Tentang Saya</h1>
    <p class="text-muted">Ikuti Halaman Website Ini Untuk Seputar Berita Terkini.</p>
  </div>

@endsection
