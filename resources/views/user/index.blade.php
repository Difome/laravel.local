@extends('layouts.app')


@section('content')
<div class="container" id="from_ajax">
  <div class="row justify-content-center">
      <div class="col-md-8">
        @foreach ($users as $user)
          <div class="card mt-3 mb-3">
            <div class="card-header">{{ $user->username }} <span class="float-right">{{ __('Посл.посещение') }} {{ Carbon\Carbon::parse($user->last_online_at)->diffForHumans() }} </span></div>

            <div class="card-body d-flex">

              <div style="width: 120px">
                <img src="{{ route('getAvatar', $user->avatar) }}" class="d-block rounded-circle" width="120px" height="120px">
                <div class="pt-2 font-weight-bold text-center">
                  @if ($user->name !== NULL)
                    <a class="user-name" href="{{ route('user.show', $user->username) }}">{{ $user->name }}</a>
                  @endif

                  @if ($user->country_id !== NULL)
                    {{ (app()->getLocale() == 'ru') ? $user->country->name_ru : $user->country->name_ua }},
                  @endif

                <!--
                  @if ($user->region_id !== NULL)
                   {{ (app()->getLocale() == 'ru') ? $user->region->region_ru : $user->region->region_ua }},
                  @endif
                -->

                  @if ($user->city_id !== NULL)
                    {{ (app()->getLocale() == 'ru') ? $user->city->city_ru : $user->city->city_ua }} <br />
                  @endif
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</div>

<script>

</script>
@endsection