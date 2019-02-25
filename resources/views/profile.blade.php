@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1>{{Auth::user()->name}}</h1>
        </div>
        <div class="card-body">
            <div class="row justify-content-center align-items-center">
                <div class="col-auto text-center">
                    <img src="{{route('profile.show_avatar', ['user_id' => Auth::user()->id] ) }}" alt="Immagine di profilo">
                    <br>

                    {!! Form::open(['url' => 'profile/save', 'files' => true, 'method' => 'POST', 'class'=>'custom-file', 'id'=>"avatar_upload_form"]) !!}
                    {{  Form::file("avatar-image", ["class" => "custom-file-input", "id"=>"new-avatar-file"])}}
                    <label for="new-avatar-file" class="custom-file-label" id="file-upload-filename">Cambia immagine</label>
                    {{-- {{  Form::submit('Submit Form',['class'=>'btn btn-primary'])}}    --}}
                    {!! Form::close() !!}

                </div>
                <div class=col>
                    <pre>{{Auth::user()->toJson(JSON_PRETTY_PRINT)}}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  document.getElementById("new-avatar-file").onchange = function() {
      document.getElementById("avatar_upload_form").submit();
  };
</script>
@endsection