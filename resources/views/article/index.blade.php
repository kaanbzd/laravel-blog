@extends('layouts.app')

@section('content')

    @foreach($articles as $article)
        <h4><a href="/detail/{{ $article->id }}">{{ $article->title }}</a></h4>

        <p>{{ $article->content }}</p>
    @endforeach

    {{ $articles->links() }}

@endsection


