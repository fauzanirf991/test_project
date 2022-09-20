@extends('layouts.main')
@section('container')
<h2 class="mb-5 text-center">{{ $tittle }}</h2>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="/posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if ($posts->count())
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div style="max-height: 350px; overflow:hidden; margin-right:0" class="">
                <img src="{{ asset('storage/'. $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
            @else
            <div style="max-height: 350px; overflow:hidden">
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
            @endif
        <div class="card-body text-center">
            <h4 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none">{{ $posts[0]->tittle }}</a></h4>
            <small class="text-muted">
                By <a href="/posts?author={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
            </small>
            <p class="card-text">{{ $posts[0]->excerp }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">read more...</a>

        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="position-absolute px-3 py-2" style="background: rgba(0, 0, 0, 0.5)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>

                    @if ($post->image)
                    <div style="max-height: 128px; overflow:hidden">
                        <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                    @else
                    <div style="max-height: 350px; overflow:hidden">
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                    @endif
                    {{-- <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}"> --}}
                    <div class="card-body">
                        <h5 class="card-title"><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->tittle }}</a></h5>
                        <p>
                            <small class="text-muted">By <a href="/posts?author={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> created at {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerp }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">read more...</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@else
    <p class="text-center">No Post Found</p>

@endif

{{ $posts->links() }}


{{-- @foreach ($posts as $post)
<article class="mb-3 border-bottom pb-3">
    <h4>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->tittle }}</a>
    </h4>

    <h6>By <a href="/authors/{{ $post->user->id }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h6>

    <p>{{ $post->excerp }}</p>
</article>

@endforeach --}}

@endsection

