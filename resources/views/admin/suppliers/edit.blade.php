@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.groups.title')</h3>

    {!! Form::model($supplier, ['method' => 'PUT', 'route' => ['admin.suppliers.update', $supplier->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Name', 'Name der Versorger'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('Name', old('Name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Name'))
                        <p class="help-block">
                            {{ $errors->first('Name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('anschrift', 'Anschrift'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('anschrift', old('anschrift'), ['class' => 'form-control', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('anschrift'))
                        <p class="help-block">
                            {{ $errors->first('anschrift') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop
