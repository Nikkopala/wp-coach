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

                    {!! Form::open(['url' => 'profile/upload_avatar', 'files' => true, 'method' => 'POST']) !!}
                    {{  Form::file("avatar-image", ["class" => "form-group",])}}
                    {{  Form::submit('Submit Form')}}
                    {!! Form::close() !!}

                </div>
                <div class=col>
                    <pre>{{Auth::user()->toJson(JSON_PRETTY_PRINT)}}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection