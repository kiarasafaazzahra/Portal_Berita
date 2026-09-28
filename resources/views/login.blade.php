@extends('layouts.app')
@section('title', 'login | Portal Berita')
@section('content')
    <h2>Login</h2>
   @if(session('success'))
   <div class="alert alert-success">
    {{ session('success')}}
   </div>
   @endif
    @if(session('error'))
   <div class="alert alert-danger">
    {{ session('error')}}
   </div>
   @endif
     <form action="{{ route('login')}}" method="post">
    @csrf
    <input class="form-control mb-3" type="text" name="username" id="" placeholder="username" required>
    <input class="form-control mb-3" type="password" name="password" id="" placeholder="password" required>
    <button class="btn btn-primary form-control" type="submit">Login</button>
    <a href= "/"class="btn btn-outline-secondary">Kembali</a>
    </form>   
@endsection