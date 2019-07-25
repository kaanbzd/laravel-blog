@extends('Layouts.app')
@section('content')
<form action="/edit/{{$article->id}}" method="post">
    @method('put')
    @csrf
    <label for="title">Başlık</label>
    <input type="text" name="title" id="title" value="{{$article->title}}">
    <br>
    <label for="content">İçerik</label>
    <textarea id="content" name="detail" cols="65" rows="15">{{$article->content}}</textarea>
    <br>
    <button type="submit">Güncelle</button>
</form>
@endsection