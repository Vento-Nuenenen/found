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

                <a href="{{ route('groups') }}" class="float-right">Zurück zu Items</a>
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
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
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
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
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
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
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
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
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

                <div class="form-group has-feedback row {{ $errors->has('group_active') ? ' has-error ' : '' }}">
                    {!! Form::label('returned', 'Zurückgegeben?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="returned" name="returned" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger">
                        </div>
                        @if ($errors->has('returned'))
                            <span class="help-block">
                                <strong>{{ $errors->first('returned') }}</strong>
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
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
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

                <div class="form-group has-feedback row {{ $errors->has('group_active') ? ' has-error ' : '' }}">
                    {!! Form::label('returned', 'Zurückgegeben?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="returned" name="returned" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger">
                        </div>
                        @if ($errors->has('returned'))
                            <span class="help-block">
                                <strong>{{ $errors->first('returned') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('group_active') ? ' has-error ' : '' }}">
                    {!! Form::label('returned', 'Zurückgegeben?', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input id="returned" name="returned" type="checkbox" data-toggle="toggle" data-on="Ja" data-off="Nein" data-onstyle="success" data-offstyle="danger">
                        </div>
                        @if ($errors->has('returned'))
                            <span class="help-block">
                                <strong>{{ $errors->first('returned') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('fk_events') ? ' has-error ' : '' }}">
                    {!! Form::label('fk_events', 'Item ID', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('item_identifier', NULL, array('id' => 'item_identifier', 'class' => 'form-control', 'placeholder' => 'Item ID', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('fk_events'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fk_events') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('fk_groups') ? ' has-error ' : '' }}">
                    {!! Form::label('fk_groups', 'Item ID', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('fk_groups', NULL, array('id' => 'item_identifier', 'class' => 'form-control', 'placeholder' => 'Item ID', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('fk_groups'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fk_groups') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('fk_customers') ? ' has-error ' : '' }}">
                    {!! Form::label('fk_customers', 'Item ID', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            {!! Form::text('fk_customers', NULL, array('id' => 'item_identifier', 'class' => 'form-control', 'placeholder' => 'Item ID', 'required')) !!}
                            <div class="input-group-append">
                                <label class="input-group-text" for="group_name">
                                    <i class="fa fa-group" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        @if ($errors->has('fk_customers'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fk_customers') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group has-feedback row {{ $errors->has('item_img') ? ' has-error ' : '' }}">
                    {!! Form::label('item_img', 'Itembild', array('class' => 'col-md-3 control-label')); !!}
                    <div class="col-md-9">
                        <div class="input-group">
                            <input type="file" accept="image/*" id="item_img" name="group_logo" />
                        </div>
                        @if ($errors->has('item_img'))
                            <span class="help-block">
                                <strong>{{ $errors->first('item_img') }}</strong>
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
