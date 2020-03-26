@extends('layouts.app')

@section('title', $publication->title)

@section('content')

<div class="card">
  <div class="card-body">
    <h3>{{ $publication->title }}</h3>
    <p>{{ $publication->text }}</p>
    <p>{{ Str::slug($publication->title) }}</p>
  </div>
</div>

@endsection
