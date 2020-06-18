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
                <h5>Barcode Auslesen</h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent=".User">
                <div class="card-body table-responsive">
                    <form method="post">
                        @csrf
                        <input class="col-6" type="number" id="barcode" name="barcode" maxlength="13" autofocus />
                        <input class="col-4 offset-1 btn btn-success" value="Zeigen" type="submit" />
                    </form>

                    <div class="card-body table-responsive">
                        @if($tn ?? '')
                            <table id="dataTable" class="table table-hover">
                                <tr>
                                    <th>Barcode: </th>
                                    <td>{{ $tn->barcode }}</td>
                                </tr>
                                <tr>
                                    <th>Pfadiname: </th>
                                    <td>{{ isset($tn->scout_name) ? $tn->scout_name : 'K.A.' }}</td>
                                </tr>
                                <tr>
                                    <th>Vor- & Nachname: </th>
                                    <td>{{ $tn->first_name . ' ' . $tn->last_name }}</td>
                                </tr>
                                <tr>
                                    <th>Gruppe: </th>
                                    <td>{{ $tn->group_name }}</td>
                                </tr>
                                <tr>
                                    <th>Sitzplatz: </th>
                                    <td>{{ $tn->seat_number }}</td>
                                </tr>
                                <tr>
                                    <th>Aktuelle Punkte: </th>
                                    <td>{{ $tn->current_balance }}</td>
                                </tr>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Tischordnung erstellen</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <input onclick="return confirm('Are you sure?')" type="submit" name="tableorder" id="tableorder" class="btn btn-success col-md-12" value="Tischordnung erstellen" />
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header" >
                <h5>Gruppen aufteilen</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <input onclick="return confirm('Are you sure?')" type="submit" name="grouping" id="grouping" class="btn btn-success col-md-12" value="Gruppen aufteilen" />
                </form>
            </div>
        </div>
    </div>
@endsection