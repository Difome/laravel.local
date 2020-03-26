@extends('layouts.app')
@section('title', __('Персональная страница пользователя', ['username' => $user->username]))
@section('content')

  @include('user.partials.header')


<ul class="nav nav-pills nav-fill mt-5">
  <li class="nav-item">
    <a class="nav-link active" href="#">Публикации</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('user.photos', $user->username) }}">{{ __('Фото') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">{{ __('Подписчики') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">{{ __('Подписки') }}</a>
  </li>
</ul>

<div class="d-flex p2 justify-content-between">
<a class="btn btn-warning mt-3" href="{{ route('photo.upload') }}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-camera-retro"></i> {{ __('Добавить фото') }}</a>

<a class="btn btn-success mt-3" data-toggle="collapse" href="#publicationCreateForm" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-pencil-alt"></i> {{ __('Создать запись') }}</a>
</div>

<div class="collapse" id="publicationCreateForm">
  <div class="card mt-5">
    <div class="card-body">
      <form method="POST" action="{{ route('publication.create') }}">
        @csrf
        <div class="form-group">
          <label for="name">{{ __('Название записи') }}</label>
          <input class="form-control" name="title" type="text" value="{{ old('title') }}">
          @error('title')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="form-group">
          <label for="name">{{ __('Текст записи') }}</label>
          <textarea class="form-control" id="text" name="text">{{ old('text') }}</textarea>
          @error('text')
            <p class="help-block text-danger">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn btn-warning float-right">{{ __('Опубликовать') }}</button>
      </form>
    </div>
  </div>
</div>

@endsection