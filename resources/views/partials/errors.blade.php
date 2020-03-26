@if(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}  
  </div>
@endif