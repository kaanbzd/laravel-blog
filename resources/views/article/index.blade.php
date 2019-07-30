@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-8">
    @foreach($articles as $article)
        <h4><a href="/detail/{{ $article->id }}">{{ $article->title }}</a></h4>

        <p>{{ $article->content }}</p>
    @endforeach

    {{ $articles->appends($_GET)->links() }}
</div>
<div class="col-md-4">
 @foreach ( $tags as $tag)
    <a href="/?tag={{$tag->id}}">{{$tag->name}}</a>
 @endforeach
</div>
</div>
@endsection


