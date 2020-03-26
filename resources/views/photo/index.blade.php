@extends('layouts.app')
@section('title', 'Фото пользователя '.$user->username)
@section('content')

@include('partials.success')

@include('user.partials.header')

<ul class="nav nav-pills nav-fill mt-5">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user.show', $user->username) }}">{{ __('Публикации') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('user.photos', $user->username) }}">{{ __('Фото') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">{{ __('Подписчики') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">{{ __('Подписки') }}</a>
  </li>
</ul>

<div class="row mt-4">
  @foreach($user->photos as $photo)
  <div class="col-auto mb-3">
    <a href="{{ route('photo.show', $photo->id) }}">
    <img src="/storage/photos/200/{{ $photo->name }}.{{ $photo->extension }}" alt="{{ $photo->alt }}"  class="rounded" height="191px" width="191px">
    </a>
  </div>
  @endforeach
</div>

@if (auth()->check() && auth()->user()->id == $user->id)
  <a class="btn btn-warning" href="{{ route('photo.upload') }}">Добавить фото</a>
@endif

@endsection