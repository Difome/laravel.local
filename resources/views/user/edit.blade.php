@extends('layouts.app')
@section('title', auth()->user()->username)
@section('content')
  <h3 class="display-5 mb-4">{{ __('Редактирование профиля') }}</h3>

  @include('partials.success')

  @include('user.partials.nav')

  <div class="card p-3">
    <div class="card-body">
    <form method="POST" action="{{ route('user.edit') }}">
      @csrf

      <div class="form-group">
        <label for="name">{{ __('Имя') }}</label>
        <input class="form-control" name="name" value="{{ auth()->user()->name }}">
      @error('name')
        <p class="help-block text-danger">{{ $message }}</p>
      @enderror
      </div>

      <div class="form-group">
        <label for="name">{{ __('Обо мне') }}</label>
        <textarea class="form-control" id="textarea" name="biography">{{ auth()->user()->biography }}</textarea>
      @error('biography')
        <p class="help-block text-danger">{{ $message }}</p>
      @enderror
      </div>

      <button type="submit" class="btn btn-warning float-right">{{ __('Сохранить') }}</button>
    </form>
    </div>
  </div>
@endsection