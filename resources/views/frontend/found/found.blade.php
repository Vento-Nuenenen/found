@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <h3>Unsere Fundgegenstände</h3>

        <br />

        <h4>Filtern:</h4>
        <div>
            <div class="dropdown float-left">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter">&nbsp; Anlass</i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($events as $event)
                        <a class="dropdown-item" href="#">{{ $event->event_name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="dropdown float-left ml-5">
                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter">&nbsp; Kategorie</i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach($groups as $group)
                        <a class="dropdown-item">{{ $group->group_name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="clearfix"></div>
        </div>

        <br />

        <div class="row">
            @if($items != null)
                @foreach($items as $item)
                    <div class="col-md-4 col-sm-12 p-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->item_name }} - Referenz: {{ $item->item_identifier }}</h5>
                                <p class="card-text">Farbe: {{ $item->item_color ?? 'Keine Angabe' }}</p>
                                <p class="card-text">Grösse: {{ $item->item_size ?? 'Keine Angabe' }}</p>
                                <p class="card-text">Event: {{ $item->event->event_name ?? 'Keine Angabe' }}</p>
                                <p class="card-text">Gruppe: {{ $item->group->group_name ?? 'Keine Angabe' }}</p>
                                <p class="card-text"><small class="text-muted">Eingestellt am {{ $item->created_at }}, aktualisiert am {{ $item->updated_at }}</small></p>
                            </div>
                            <img class="card-img-bottom" src="{{ !empty($item->item_img) ? asset('storage/img/' . $item->item_img) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                            <a href="{{ route('show-found', $item->id) }}" class="btn btn-primary stretched-link">Details ansehen</a>
                        </div>
                    </div>
                @endforeach
            @else
                <h1>Aktuell haben wir keine Fundgegenstände offen!</h1>
            @endif
        </div>
        {{ $items->links() }}
    </div>
@endsection
