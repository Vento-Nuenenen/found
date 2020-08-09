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
                {!! Form::open(array('route' => 'items', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                <div class="input-group" id="adv-search">
                    {!! Form::text('search', NULL, array('id' => 'search', 'class' => 'form-control', 'placeholder' => 'Suche', 'autofocus')) !!}
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary form-control">
                            <span class="fa fa-search"></span>
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="input-group" id="adv-search">
                    <button onclick="location.href='{{ route('add-items') }}'" type="button" class="btn btn-primary form-control mt-2">Neues Item</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="float-left">Items</h5>

                <a href="{{  route('overwatch') }}" class="float-right">Zurück zu Overwatch</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <th>
                        Item ID
                    </th>
                    <th>
                        Itemname
                    </th>
                    <th>
                        Farbe
                    </th>
                    <th>
                        Grösse
                    </th>
                    <th>
                        Zurückgegeben
                    </th>
                    <th>
                        Preis
                    </th>
                    <th>
                        Verkauft
                    </th>
                    <th>
                        Bild
                    </th>
                    <th>
                        Event
                    </th>
                    <th>
                        Gruppe
                    </th>
                    <th>
                        Optionen
                    </th>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                {{ $item->item_identifier }}
                            </td>
                            <td>
                                {{ $item->item_name }}
                            </td>
                            <td>
                                {{ $item->item_color }}
                            </td>
                            <td>
                                {{ $item->item_size }}
                            </td>
                            <td>
                                @if($item->item_returned == true)
                                    Ja
                                @else
                                    Nein
                                @endif
                            </td>
                            <td>
                                @if($item->item_price == null)
                                    K.A.
                                @else
                                    {{ $item->item_price }}
                                @endif
                            </td>
                            <td>
                                @if($item->item_sold == true)
                                    Ja
                                @else
                                    Nein
                                @endif
                            </td>
                            <td>
                                <img width="80px" src="{{ $item->item_img ? asset('storage/img/' . $item->img_name) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                            </td>
                            <td>
                                {{ $item->event->event_name }}
                            </td>
                            <td>
                                {{ $item->group->group_name }}
                            </td>
                            <td>
                                <button onclick="location.href='{{ route('edit-items',$item->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-edit"></span></button>
                                <button onclick="location.href='{{ route('destroy-items',$item->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-remove"></span></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $items->links() }}
            </div>
        </div>
    </div>
@endsection
