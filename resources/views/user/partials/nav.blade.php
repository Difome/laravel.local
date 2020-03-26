<ul class="nav nav-pills nav-fill mt-1 mb-5">
  <li class="nav-item">
    <a class="nav-link @if (Route::current()->getName() == 'user.edit') active @endif" href="@if (Route::current()->getName() == route('user.edit')) {{ route('user.edit')}} @endif">{{ __('Основное') }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link @if (Route::current()->getName() == 'user.editAvatar') active @endif" href="@if (Route::current()->getName()!== route('user.editAvatar')) {{ route('user.editAvatar')}} @endif">{{ __('Avatar') }}</a>
  </li>
  </li>
</ul>