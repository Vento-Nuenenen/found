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
                <h5 class="float-left">Anfragen</h5>

                <a href="{{  route('overwatch') }}" class="float-right">Zurück zu Overwatch</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>
                            Name
                        </th>
                        <th>
                            Mail
                        </th>
                        <th>
                            Item - ID
                        </th>
                        <th>
                            Item - Name
                        </th>
                        <th>
                            Item - Farbe
                        </th>
                        <th>
                            Optionen
                        </th>
                    </thead>
                    <tbody>
                        @foreach($claims as $claim)
                            <tr>
                                <td>
                                    {{ $claim->customer_name }}
                                </td>
                                <td>
                                    {{ $claim->customer_mail }}
                                </td>
                                <td>
                                    {{ $claim->item->item_identifier }}
                                </td>
                                <td>
                                    {{ $claim->item->item_name }}
                                </td>
                                <td>
                                    {{ $claim->item->item_color }}
                                </td>
                                <td>
                                    <button onclick="location.href='{{ route('show-claims', $claim->id) }}'" class="btn btn-success ml-2"><span class="fa fa-eye"></span></button>
                                    <button onclick="location.href='{{ route('destroy-claims', $claim->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-remove"></span></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
