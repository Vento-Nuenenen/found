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
                <h5 class="float-left">Item Events</h5>

                <a href="{{  route('overwatch') }}" class="float-right">Zurück zu Overwatch</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                    <th>
                        Eventname
                    </th>
                    <th>
                        Eventdatum
                    </th>
                    <th>
                        Sichtbar?
                    </th>
                    <th>
                        Optionen
                    </th>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>
                                {{ $event->event_name }}
                            </td>
                            <td>
                                {{ $event->event_date }}
                            </td>
                            <td>
                                @if($event->event_active == true)
                                    Ja
                                @else
                                    Nein
                                @endif
                            </td>
                            <td>
                                <button onclick="location.href='{{ route('edit-events', $event->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-edit"></span></button>
                                <button onclick="location.href='{{ route('destroy-events', $event->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-remove"></span></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
