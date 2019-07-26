@extends('Layouts.app')
@section('content')
<form action="/create" method="post">
    @csrf
    <label for="tittle">Başlık</label>
    <input type="text" name="title" id="title">
     <br>
    <label for="content">İçerik</label>
    <textarea id ="content" name="detail" cols="90" row="90"></textarea>
    <br>
    Etiket: <input type="text" name="tag" id="tag">
    <br>
    <button type="submit">Oluştur</button>
    
</form>

@endsection