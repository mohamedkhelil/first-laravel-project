@extends('layouts.app')

@section('title','Services')

@section('content')
<h1 style="color:#FF2D20;">Nos Services</h1>
@foreach($services as $service)
<div style="background:white; padding:20px; margin:15px 0; border:2px solid #FF2D20; border-radius:10px;">
    <h3>{{ $service['nom'] }}</h3>
    <p><strong>Prix :</strong> {{ $service['prix'] }}</p>
</div>
@endforeach
@endsection