@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <h3>Neueste Fundgegenstände</h3>

        <br />

        @if($items != null)
            @foreach($items as $item)
                <div class="card-group">
                    <div class="card col-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item_name }} - {{ $item->item_identifier }}</h5>
                            <p class="card-text">Farbe: {{ $item->item_color }}</p>
                            <p class="card-text">Grösse: {{ $item->item_size }}</p>
                            <p class="card-text">Event: {{ $item->event->event_name }}</p>
                            <p class="card-text">Gruppe: {{ $item->group->group_name }}</p>
                            <p class="card-text"><small class="text-muted">Eingestellt am {{ $item->created_at }}, aktualisiert am {{ $item->updated_at }}</small></p>
                        </div>
                        <img class="card-img-bottom" src="{{ $item->item_img ?? asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
