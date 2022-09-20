
@extends('layouts.main')
@section('container')
<h2>Post Category : {{ $category }}</h2>
@foreach ($posts as $post)
<article class="mb-5">
    <h3>
        <a href="/posts/{{ $post->slug}}">{{ $post->tittle }}</a>
    </h3>
    <h5>{{ $post->author }}</h5>
    <p>{{ $post->excerp }}</p>
</article>
@endforeach

@endsection

