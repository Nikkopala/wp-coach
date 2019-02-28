@extends('layouts.app')

@section('content')
<div class="accordion" id="clubAccordion">
    @foreach ($clubs as $club)
    <div class="card">
        <div class="card-header button btn-link"
             id="club-heading-{{$loop->index}}"
             data-toggle="collapse"
             data-target="#collapse{{$loop->index}}"
             aria-expanded="true"
             aria-controls="collapse{{$loop->index}}">
            <h2 class="mb-0">
                <button class="btn btn-link"
                        type="button">
                {{$club["name"]}}
                </button>
            </h2>
        </div>
        <div id="collapse{{$loop->index}}"
             class="collapse show"
             aria-labelledby="club-heading-{{$loop->index}}"
             data-parent="#clubAccordion">
            <div class="card-body">
                lista squadre
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
