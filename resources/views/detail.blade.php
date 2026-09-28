@extends('layouts.app')
@section('title' , 'Detail | Portal Berita')
@section('content')
    <h2>{{ $berita->judul }}</h2>
    <div class="">
        <img src="{{ url('storage/'. $berita->gambar)}}" alt="" style="border-radius: 5px">
        <p class="fs-5 mt-4">{{ $berita->isi}}</p>
        <p class="badge text-bg-secondary">{{ $berita->tgl}}</p>
        <p>Ditulis Oleh <strong>{{ $berita->penulis->username}}</strong></p>
  @if(session()->has('key'))
            <div class="float-end">
                <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                    Kembali
                </a>   
            </div>
        @else
              <a href= "/"class="btn btn-outline-secondary">
                    Kembali
                </a>
        @endif
    </div>
@endsection
    
