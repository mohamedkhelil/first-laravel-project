@extends('layouts.app')

@section('title',$article['titre'])

@section('content')
<h1 style="color:#FF2D20;">{{ $article['titre'] }}</h1>
<p>Par {{ $article['auteur'] }}</p>
<div style="margin-top:20px;">{{ $article['contenu'] }}</div>
@endsection