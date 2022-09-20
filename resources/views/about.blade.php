@extends('layouts.main')
@section('container')
<div class="container mt-4" >
    <h1>About</h1>
    <h3>{{ $nama }}</h3>
    <p>{{ $email }}</p>
    <img src="img/iptek.png" alt="image1" width="100" height="100">
  </div>
@endsection
