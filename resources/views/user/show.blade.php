@extends('layouts.app')

@section('title', $user->username)

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-7">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div>
@endif

@if(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}  
  </div>
@endif
          <div class="card shadow p-3 bg-white border border-light">

            <div class="card-body m-3">

              <div class="mx-auto">
                <img src="{{ route('getAvatar', $user->avatar) }}" class="d-block mx-auto rounded-circle" width="120px" height="120px">

                <div class="pt-2 text-center">
                  <div class="user-name font-weight-bold">{{ $user->username }}</div>

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
                <a class="pl-md-4 pr-md-4">
                  <b>{{ $user->posts->count() }}</b> {{ trans_choice('plurals.publications', $user->posts->count()) }} </a>

                <a class="pl-md-4 pr-md-4"><b>{{ $user->posts->count() }}</b> {{ trans_choice('plurals.publications', $user->posts->count()) }} </a>

                <a class="pl-md-4 pr-md-4"><b>{{ $user->photos->count() }}</b> {{ trans_choice('plurals.photos', $user->photos->count()) }} </a>

                <a class="pl-md-4 pr-md-4"><b>{{ $user->followings->count() }}</b> {{ trans_choice('plurals.following', $user->followings->count()) }} </a>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection