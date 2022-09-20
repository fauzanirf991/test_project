@extends('layouts.main')
@section('container')
<h1 class="mb-5 ">Post Category</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4 mb-3">
            <div class="card bg-dark text-white">
                <img src="https://source.unsplash.com/600x400?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                <div class="card-img-overlay d-flex align-items-center p-0">

                    <h5 class="card-title text-center flex-fill p-4" style="background: rgba(0, 0, 0, 0.5)"><a href="/posts?category={{ $category->slug }}" class="text-decoration-none text-light">{{ $category->name }}</a></h5>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @foreach ($categories as $category)
 <ul>
     <li>
        <h2>
            <a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
        </h2>
     </li>
 </ul>


@endforeach --}}

@endsection
