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
                        <h4>Claim: {{ $claim->customer_name ?? '-' }}</h4>
                    </p>
                    <p>
                        <h4>E-Mail: {{ $claim->customer_mail ?? '-' }}</h4>
                    </p>
                </div>
                <br />
                <hr />
                <br />
                <div class="float-left">
                    <p>
                        <h5>Farbe: {{ $claim->item->item_color ?? '-' }}</h5>
                    </p>
                    <p>
                        <h5>Grösse: {{ $claim->item->item_size ?? '-' }}</h5>
                    </p>
                    <p>
                        <h5>Event: {{ $claim->item->event->event_name ?? '-' }}</h5>
                    </p>
                    <p>
                        <h5>Gruppe: {{ $claim->item->group->group_name ?? '-' }}</h5>
                    </p>
                </div>
                <div class="float-right">
                    <img class="col-6 rounded float-right" src="{{ $claim->item->item_img ? asset('storage/img/' . $claim->item->img_name) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                </div>
                <br />
                <div class="clearfix"></div>
                <br />
                <div>
                    <form method="post" action="{{ route('update-claims', $claim->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="returned">
                        <input onclick="return confirm('Are you sure?')" type="submit" name="grouping" id="grouping" class="btn btn-success col-md-5 float-left" value="Zurückgegeben?" />
                    </form>
                    <form method="post" action="{{ route('update-claims', $claim->id) }}">
                        @csrf
                        <input type="hidden" name="action" value="sold">
                        <input onclick="return confirm('Are you sure?')" type="submit" name="grouping" id="grouping" class="btn btn-success col-md-5 offset-1 float-left" value="Verkauft?" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
