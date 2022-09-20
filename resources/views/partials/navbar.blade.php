@extends('layouts.main')
@section('navbar')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fs-3" href="#"><img src="img\iptek.png" alt="logo" width="56" height="56"> My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Home") ? "active" : ""}}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Posts") ? "active" : ""}}" href="/posts">Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Categories") ? "active" : ""}}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "About") ? "active" : ""}}" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Contact") ? "active" : ""}}" href="/contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "Login") ? "active" : ""}}" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

@endsection
