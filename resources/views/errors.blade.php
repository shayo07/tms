@if($message = Session::get('failed'))
<div  class="alert alert-danger alerts col-12">
    <strong>{{ $message }}</strong>
</div>
@endif

@if($message = Session::get('success'))
<div  class="alert alert-success alerts col-12">
    <strong>{{ $message }}</strong>
</div>
@endif

@if($message = Session::get('error'))
<div  class="alert alert-danger alerts col-12">
    <strong>{{ $message }}</strong>
</div>
@endif

