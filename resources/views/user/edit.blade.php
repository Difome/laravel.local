@extends('layouts.app')

@section('title', auth()->user()->username)

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-7">
          <div class="card shadow p-3 bg-white border border-light">
            <h3 class="mt-3">{{ __('Загрузка аватара') }}</h3>
            <div class="mx-auto">
              <div id="upload-demo" style="width:350px">
              </div>

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




<script type="text/javascript">


$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});


$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'square'
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});


$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $.ajax({
      url: "/edit",
      type: "POST",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
      data: {"image":resp},
      success: function (data) {
        html = '<img src="' + resp + '" />';
        $("#upload-demo-i").html(html);
      }
    });
  });
});


</script>

@endsection