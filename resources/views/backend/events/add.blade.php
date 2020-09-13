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
                <h5 class="float-left">Event erstellen</h5>

                <a href="{{ route('events') }}" class="float-right">Zurück zu Events</a>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'store-events', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation')) !!}
                {!! csrf_field() !!}

                <div class="form-group has-feedback row {{ $errors->has('event_name') ? ' has-error ' : '' }}">
                    {!! Form::label('event_name', 'Eventname', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('event_name', NULL, array('id' => 'event_name', 'class' => 'form-control', 'placeholder' => 'Eventname', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="event_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('event_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('event_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('event_date') ? ' has-error ' : '' }}">
                    {!! Form::label('event_date', 'Eventdatum', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::date('event_date', NULL, array('id' => 'group_name', 'class' => 'form-control', 'placeholder' => 'Eventdatum', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="event_date">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('event_date'))
                            <span class="help-block">
                                <strong>{{ $errors->first('event_date') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('event_active') ? ' has-error ' : '' }}">
                    {!! Form::label('event_active', 'Aktiv?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="event_active" name="group_active" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger" checked>
                        </div>
                        @if ($errors->has('event_active'))
                            <span class="help-block">
                                <strong>{{ $errors->first('event_active') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {!! Form::button('Gruppe erstellen', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
