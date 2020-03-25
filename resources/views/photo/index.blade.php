@extends('layouts.app')

@section('title', 'Фото '.$user->username)

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-7">
          <div class="card shadow-lg p-3 bg-white border border-light">

            <div class="card-body m-3">

              <div class="mx-auto">
                <img src="/storage/photos/200_1584910636.jpg" class="d-block mx-auto rounded-circle" width="120px" height="120px">

                <div class="pt-2 text-center">
                  <div class="user-name font-weight-bold">{{ '@'.$user->username }}</div>

                  @if ($user->country_id !== NULL)
                    <span class="text-muted">{{ (app()->getLocale() == 'ru') ? $user->country->name_ru : $user->country->name_ua }},</span>
                  @endif

                <!--
                  @if ($user->region_id !== NULL)
                   {{ (app()->getLocale() == 'ru') ? $user->region->region_ru : $user->region->region_ua }},
                  @endif
                -->

                  @if ($user->city_id !== NULL)
                    <span class="text-muted">{{ (app()->getLocale() == 'ru') ? $user->city->city_ru : $user->city->city_ua }}</span>
                  @endif

                  @if ($user->biography !== NULL)
                    <h3 class="m-2">{{ $user->biography }}</h3>
                  @endif
                </div>
              </div>

              <div class="mt-5 text-center">
                <a class="pl-md-4 pr-md-4" href="{{ route('user.show', $user->username) }}">
                  <b>{{ $user->posts->count() }}</b> {{ trans_choice('plurals.publications', $user->posts->count()) }} </a>

                <a class="pl-md-4 pr-md-4">
                  <b>{{ $user->photos->count() }}</b> {{ trans_choice('plurals.photos', $user->photos->count()) }} </a>

                <a class="pl-md-4 pr-md-4" href="{{ route('user.show', $user->username) }}">
                  <b>{{ $user->followers->count() }}</b> {{ trans_choice('plurals.followers', $user->followers->count()) }} </a>

                <a class="pl-md-4 pr-md-4" href="{{ route('user.show', $user->username) }}">
                  <b>{{ $user->followings->count() }}</b> {{ trans_choice('plurals.following', $user->followings->count()) }} </a>
              </div>
            </div>
          </div>


        <div class="row mt-4">

        @foreach($user->photos as $photo)
          <div class="col-auto mb-3">
            <a href="{{ route('photo.show', $photo->id) }}">
              <img src="/storage/photos/200/{{ $photo->name }}.{{ $photo->extension }}" alt="{{ $photo->alt }}"  class="rounded" height="191px" width="191px">
            </a>
          </div>
        @endforeach

        </div>

        <a class="btn btn-warning" href="{{ route('photo.upload') }}">Добавить фото</a>

      </div>
  </div>


</div>
@endsection