@extends('layouts.app')

@section('title', auth()->user()->username)

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-7">
          <div class="card p-3">
            <h3 class="mt-3">{{ __('Загрузка аватара') }}</h3>
            <div class="mx-auto">

<img id="image" src="http://laravel.local/getAvatar/1585091158.png" crossorigin="" class="cropper-hidden">
              <div id="result"></div>

              <div class="col-md-8" style="padding-top:30px;">
                <strong>{{ __('Выберите фото') }}:</strong>
                <br/>
                <input type="file" id="upload">
                <br/> <br>
                <button class="btn btn-success upload-result">{{ __('Загрузить') }}</button>
                <br>
                <div id="upload-demo-i"></div>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
  <link rel="stylesheet" href="https://fengyuanchen.github.io/cropperjs/css/cropper.css">


<script type="text/javascript" src="https://fengyuanchen.github.io/cropperjs/js/cropper.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', function () {
      var image = document.querySelector('#image');
      var result = document.querySelector('#result');
      var cropper = new Cropper(image, {
        ready: function () {
          var image = new Image();

          image.src = cropper.getCroppedCanvas().toDataURL('image/png');
          result.appendChild(image);
        },
      });
    });
  </script>

@endsection