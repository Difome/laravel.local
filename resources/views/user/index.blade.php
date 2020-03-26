@extends('layouts.app')
@section('title', __('Знакомства'))
@section('content')

@foreach ($users as $user)
  <div class="card p-4 mt-3 mb-3">
    <div class="media">
      <img src="{{ route('getAvatar', $user->avatar) }}" class="align-self-start mr-3 d-block rounded-circle" width="120px" height="120px" alt="...">
      <div class="media-body">
        <div class="mt-3">
          <a class="user-name font-weight-bold text-decoration-none" href="{{ route('user.show', $user->username) }}">{{ $user->username }}</a>
        </div>

      @if ($user->name !== NULL)
        <div class="user__name">{{ $user->name }}</div>
      @endif

      @if ($user->country_id !== NULL || $user->city_id !== NULL)
        <div class="user-city">{{ (app()->getLocale() == 'ru') ? $user->country->name_ru : $user->country->name_uk }}, {{ (app()->getLocale() == 'ru') ? $user->city->city_ru : $user->city->city_uk }}</div>
      @endif
      
      <div class="user_online_time mt-1 text-muted">{{ Carbon\Carbon::parse($user->last_online_at)->diffForHumans() }}</div>
      </div>
    </div>
  </div>
@endforeach
  {{ $users->links() }}
@endsection