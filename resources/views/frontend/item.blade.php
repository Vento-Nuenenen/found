@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="float-left">{{ $item->item_name }} - Referenz: {{ $item->item_identifier }}</h5>

                <a href="{{  route('frontend') }}" class="float-right">Zurück zur Übersicht</a>
            </div>
            <div class="card-body">
                <div class="float-left">
                    <p>
                        <h5>Farbe: {{ $item->item_color ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Grösse: {{ $item->item_size ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Event: {{ $item->event->event_name ?? 'Keine Angabe' }}</h5>
                    </p>
                    <p>
                        <h5>Gruppe: {{ $item->group->group_name ?? 'Keine Angabe' }}</h5>
                    </p>
                </div>
                <div>
                    <img class="col-6 rounded float-right" src="{{ $item->item_img ? asset('storage/img/' . $item->img_name) : asset("/storage/placeholder-".random_int(1, 3).".png") }}" alt="Item image">
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix p-3"></div>

    <div class="card">
        <div class="card-header">
            <h5>Das ist meines!</h5>
        </div>
        <div class="card-body">
            <div class="form-group has-feedback row {{ $errors->has('customer_name') ? ' has-error ' : '' }}">
                {!! Form::label('customer_name', 'Vor & Nachname', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                    <div class="input-group">
                        {!! Form::text('customer_name', NULL, array('id' => 'item_identifier', 'class' => 'form-control', 'placeholder' => 'Vor & Nachname', 'required')) !!}
                        <div class="input-group-append">
                            <label class="input-group-text" for="item_identifier">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('customer_name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback row {{ $errors->has('customer_mail') ? ' has-error ' : '' }}">
                {!! Form::label('customer_mail', 'E-Mail', array('class' => 'col-md-3 control-label')); !!}
                <div class="col-md-9">
                    <div class="input-group">
                        {!! Form::email('customer_mail', NULL, array('id' => 'customer_mail', 'class' => 'form-control', 'placeholder' => 'E-Mail', 'required')) !!}
                        <div class="input-group-append">
                            <label class="input-group-text" for="customer_mail">
                                <i class="fa fa-at" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    @if ($errors->has('customer_mail'))
                        <span class="help-block">
                            <strong>{{ $errors->first('customer_mail') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
