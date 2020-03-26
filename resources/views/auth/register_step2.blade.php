@extends('layouts.app')

@section('title', __('Регистрация шаг 2 (необязательно)'))

@section('content')

<div class="card">
  <div class="card-header">{{ __('Регистрация шаг 2 (необязательно)') }}</div>
  <div class="card-body">
    <form method="POST" action="{{ route('register.step2') }}">
      @csrf
      <div class="form-group row">
        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Место проживания') }}</label>
        <div class="col-md-6">
          <select class="form-control" id="country" name="country_id">
            <option value="">{{ __('Выберите свою страну') }}</option>
            @foreach ($countries as $country) 
            <option value="{{ $country->code }}" name="country_id">
              @if (app()->getLocale() == 'ru')
              {{ $country->name_ru }}
              @else
              {{ $country->name_uk }}
              @endif
            </option>
            @endforeach
          </select>
          <select class="form-control mt-3" name="region_id" id="region">
            <option value="">{{ __('Выберите свою область') }}</option>
          </select>
          <select class="form-control mt-3" name="city_id" id="city">
            <option value="">{{ __('Выберите свой город') }}</option>
          </select>
          @error('country_id')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Дата рождения') }}</label>
        <div class="col-md-6">
          <input id="datepicker" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>
          @error('username')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('О себе') }}</label>
        <div class="col-md-6">
          <textarea class="form-control @error('biography') is-invalid @enderror" name="biography">{{ old('biography') }}</textarea>
          @error('biography')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
          {{ __('Завершить регистрацию') }}
          </button>
          <br /><br />
          <a href="{{ route('home') }}">{{ __('Пропустить сейчас') }}</a>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection