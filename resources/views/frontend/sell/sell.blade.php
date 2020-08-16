@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <h3>Unsere Angebote</h3>

        <br />

        <div class="row">
            @if($items != null)
                @foreach($items as $item)
                    <div class="col-md-4 col-sm-12 p-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->item_name }} - Referenz: {{ $item->item_identifier }}</h4>
                                <p class="card-text">Preis: {{ $item->item_price / 100 }} CHF</p>
                                <p class="card-text">Farbe: {{ $item->item_color ?? 'Keine Angabe' }}</p>
                                <p class="card-text">Grösse: {{ $item->item_size ?? 'Keine Angabe' }}</p>
                                <p class="card-text">Gruppe: {{ $item->group->group_name ?? 'Keine Angabe' }}</p>
                                <p class="card-text"><small class="text-muted">Eingestellt am {{ $item->created_at }}, aktualisiert am {{ $item->updated_at }}</small></p>
                            </div>
                            <img class="card-img-bottom" src="{{ $item->item_img ?? asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                            <a href="{{ route('show-sell', $item->id) }}" class="btn btn-primary stretched-link">Details ansehen</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>Aktuell werden keine Gegenstände verkauft!</h1>
            @endif
        </div>
        {{ $items->links() }}
    </div>
@endsection
