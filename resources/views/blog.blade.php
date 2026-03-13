@extends('layouts.app')

@section('title','Blog')

@section('content')
<h1 style="color:#FF2D20;">Blog</h1>
@foreach($articles as $article)
<div style="background:#f5f5f5; padding:20px; margin:10px 0; border-left:4px solid #FF2D20;">
    <h3><a href="/blog/{{ $article['id'] }}">{{ $article['titre'] }}</a></h3>
    <p>Par {{ $article['auteur'] }} le {{ $article['date'] }}</p>
    <p>{{ $article['extrait'] }}</p>
</div>
@endforeach
@endsection