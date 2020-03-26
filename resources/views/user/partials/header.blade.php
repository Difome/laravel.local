<div class="card p-3">
  <div class="card-body m-3">
    <div class="mx-auto">
      <img src="{{ route('getAvatar', $user->avatar) }}" class="d-block mx-auto rounded-circle" width="120px" height="120px">
      <div class="pt-2 text-center mt-1">
        <div class="user-name font-weight-bold">{{ $user->username }}</div>

      @if ($user->name !== NULL)
        <div class="user__name mt-1">{{ $user->name }}</div>
      @endif

      @if ($user->country_id !== NULL)
        <span class="user-city">{{ (app()->getLocale() == 'ru') ? $user->country->name_ru : $user->country->name_ua }},</span>
      @endif
        <!--
          @if ($user->region_id !== NULL)
           {{ (app()->getLocale() == 'ru') ? $user->region->region_ru : $user->region->region_ua }},
          @endif
          -->
      @if ($user->city_id !== NULL)
        <span class="user-city">{{ (app()->getLocale() == 'ru') ? $user->city->city_ru : $user->city->city_ua }}</span>
      @endif

      @if ($user->biography !== NULL)
        <h3 class="m-2">{{ $user->biography }}</h3>
      @endif
      </div>
    </div>

    <div class="mt-5 text-center">
      <a class="pl-md-4 pr-md-4">
      <b>{{ $user->publications->count() }}</b> {{ trans_choice('plurals.publications', $user->publications->count()) }} </a>
      <a class="pl-md-4 pr-md-4"><b>{{ $user->photos->count() }}</b> {{ trans_choice('plurals.photos', $user->photos->count()) }} </a>
      <a class="pl-md-4 pr-md-4"><b>{{ $user->followers->count() }}</b> {{ trans_choice('plurals.followers', $user->followers->count()) }} </a>
      <a class="pl-md-4 pr-md-4"><b>{{ $user->followings->count() }}</b> {{ trans_choice('plurals.following', $user->followings->count()) }} </a>
    </div>
  </div>
</div>