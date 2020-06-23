@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="float-left">{{ $item->item_name }} - Referenz: {{ $item->item_identifier }}</h5>

                <a href="{{  route('frontend') }}" class="float-right">Zurück zur Übersicht</a>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".User">
                <div class="card-body">
                    <div class="float-left">
                        <p>
                        <h5>Farbe: {{ $item->item_color ?? 'Keine Angabe' }}</h5>
                        </p>
                        <p>
                        <h5>Grösse: {{ $item->item_size ?? 'Keine Angabe' }}</h5>
                        </p>
                        <p>
                        <h5>Event: {{ $item->event->event_name ?? 'Keine Angabe' }}</h5>
                        </p>
                        <p>
                        <h5>Gruppe: {{ $item->group->group_name ?? 'Keine Angabe' }}</h5>
                        </p>
                    </div>
                    <div>
                        <img class="col-6 rounded float-right" src="{{ $item->item_img ? asset('storage/img/' . $item->img_name) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix p-3"></div>

        <div class="card">
            <div class="card-header">
                <h5 class="float-left">Das ist meines!</h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".User">
                <div class="card-body">
                    <input />
                </div>
            </div>
        </div>
    </div>
@endsection
