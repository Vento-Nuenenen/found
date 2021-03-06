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
                <h5 class="float-left">Gruppe erstellen</h5>

                <a href="{{ route('groups') }}" class="float-right">Zurück zu Gruppen</a>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'store-groups', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'enctype' => "multipart/form-data")) !!}
                {!! csrf_field() !!}

                <div class="form-group has-feedback row {{ $errors->has('group_name') ? ' has-error ' : '' }}">
                    {!! Form::label('group_name', 'Gruppenname', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('group_name', NULL, array('id' => 'group_name', 'class' => 'form-control', 'placeholder' => 'Gruppenname', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('group_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('group_active') ? ' has-error ' : '' }}">
                    {!! Form::label('group_active', 'Sichtbar?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="group_active" name="group_active" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger" checked>
                        </div>
                        @if ($errors->has('group_active'))
                            <span class="help-block">
                                <strong>{{ $errors->first('group_active') }}</strong>
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
