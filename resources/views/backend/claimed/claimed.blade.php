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
