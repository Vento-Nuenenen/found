@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="float-left">Claim: {{ $claim->customer_name }} - Item: {{ $claim->item->item_name }} - Referenz: {{ $claim->item->item_identifier }}</h5>

                <a href="{{  route('claims') }}" class="float-right">Zurück zu den Anfragen</a>
            </div>
            <div class="card-body">
                <div>
                    <p>
                        <h4>Claim: {{ $claim->customer_name }}</h4>
                    </p>
                    <p>
                        <h4>E-Mail: {{ $claim->customer_mail }}</h4>
                    </p>
                </div>
                <br />
                <hr />
                <br />
                <div class="float-left">
                    <p>
                        <h5>Farbe: {{ $claim->item->item_color ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Grösse: {{ $claim->item->item_size ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Event: {{ $claim->item->event->event_name ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Gruppe: {{ $claim->item->group->group_name ?? 'Keine Angabe' }}</h5>
                    </p>
                </div>
                <div class="float-right">
                    <img class="col-6 rounded float-right" src="{{ $claim->item->item_img ? asset('storage/img/' . $claim->item->img_name) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                </div>
                <br />
                <div class="clearfix"></div>
                <br />
                <div>
                </div>
            </div>
        </div>
    </div>
@endsection
