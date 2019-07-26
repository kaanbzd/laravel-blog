@extends('Layouts.app')
@section('content')
    <title>{{$article->title}}</title>

<h1>{{$article->title}}</h1>

    @if  (Auth::check())
        <a href="/edit/{{$article->id}}">Düzenle</a>
        <form aciton="/detail/{{$article->id}}" method="post">
            @method('Delete')
            @csrf
            <button type ="submit">Sil</button>
        </form>
    @endif
<hr>
<p>{{$article->content}}</p>
<hr>
    <br>
    @foreach ($article->tag as $tag)
   Etiketler: {{$tag->name}}
@endforeach
 @if  (Auth::check())
    <form action="{{ url('/detail/'.$article->id.'/comment') }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <textarea name="comment" rows="10" cols="100"></textarea><br>
        <button type="submit">Gönder</button>
    </form>
    @endif
    <ul>
@foreach($article->comments as $comment)

    <li>{{ $comment->content }}</li>
        {{ $comment->created_at }}
    @endforeach
    </ul>

    
@endsection

