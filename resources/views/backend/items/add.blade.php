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
                <h5 class="float-left">Item erstellen</h5>

                <a href="{{ route('items') }}" class="float-right">Zurück zu Items</a>
            </div>
            <div class="card-body">
                {!! Form::open(array('route' => 'store-items', 'method' => 'POST', 'role' => 'form', 'class' => 'needs-validation', 'enctype' => "multipart/form-data")) !!}
                {!! csrf_field() !!}

                <div class="form-group has-feedback row {{ $errors->has('item_identifier') ? ' has-error ' : '' }}">
                    {!! Form::label('item_identifier', 'Item ID', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_identifier', NULL, array('id' => 'item_identifier', 'class' => 'form-control', 'placeholder' => 'Item ID', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="item_identifier">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('item_identifier'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_identifier') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_name') ? ' has-error ' : '' }}">
                    {!! Form::label('item_name', 'Bezeichnung', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_name', NULL, array('id' => 'item_name', 'class' => 'form-control', 'placeholder' => 'Bezeichnung', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="item_name">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('item_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_color') ? ' has-error ' : '' }}">
                    {!! Form::label('item_color', 'Farbe', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_color', NULL, array('id' => 'item_color', 'class' => 'form-control', 'placeholder' => 'Farbe')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="item_color">
                                    <i class="fa fa-gears" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('item_color'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_color') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_size') ? ' has-error ' : '' }}">
                    {!! Form::label('item_size', 'Grösse', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_size', NULL, array('id' => 'item_size', 'class' => 'form-control', 'placeholder' => 'Grösse')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="item_size">
                                    <i class="fa fa-gears" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('item_size'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_size') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_returned') ? ' has-error ' : '' }}">
                    {!! Form::label('item_returned', 'Zurückgegeben?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="item_returned" name="item_returned" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger">
                        </div>
                        @if ($errors->has('item_returned'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_returned') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_price') ? ' has-error ' : '' }}">
                    {!! Form::label('item_price', 'Preis', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_price', NULL, array('id' => 'item_price', 'class' => 'form-control', 'placeholder' => 'Preis', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="item_price">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('item_price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_price') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_sold') ? ' has-error ' : '' }}">
                    {!! Form::label('item_sold', 'Verkauft?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="item_sold" name="item_sold" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger">
                        </div>
                        @if ($errors->has('item_sold'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_sold') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_event') ? ' has-error ' : '' }}">
                    {!! Form::label('item_event', 'Itemevent', array('class' => 'col-md-3 control-label', 'required')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <select class="form-control selectpicker" data-style="btn-primary" name="item_event" id="item_event">
                                <option value="">Event wählen</option>
                                @if ($item_events)
                                    @foreach($item_events as $event)
                                        <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @if ($errors->has('item_event'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_event') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_group') ? ' has-error ' : '' }}">
                    {!! Form::label('item_group', 'Gruppe', array('class' => 'col-md-3 control-label', 'required')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <select class="form-control selectpicker" data-style="btn-primary" name="item_group" id="item_group">
                                <option value="">Gruppe wählen</option>
                                @if ($item_groups)
                                    @foreach($item_groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->group_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        @if ($errors->has('item_group'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_group') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_img') ? ' has-error ' : '' }}">
                    {!! Form::label('item_img', 'Itembild', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="file" accept="image/*" id="item_img" name="item_img" />
                        </div>
                        @if ($errors->has('item_img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_img') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                {!! Form::button('Item erstellen', array('class' => 'btn btn-success margin-bottom-1 mb-1 float-right','type' => 'submit' )) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
