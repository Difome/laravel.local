@extends('layouts.app')

@section('title', auth()->user()->username)

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-7">
          <div class="card">
            <div class="card-body m-3">
              <h3>{{ __('Загрузка фото') }}</h3>

              @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div>
              @endif

        @if (count($errors) > 0)

            <div class="alert alert-danger">
                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

                <form action="{{ route('photo.upload') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row mx-auto">
                    <div class="custom-file mb-3">
                      <input type="file" class="custom-file-input" id="customFile" name="photo">
                      <label class="custom-file-label" for="customFile">Выберите фото</label>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Загрузить</button>
                  </div>
                </form>
            </div>
          </div>
      </div>
  </div>
</div>
@endsection