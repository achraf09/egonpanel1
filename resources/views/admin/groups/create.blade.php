@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.groups.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.groups.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('grp_name', trans('quickadmin.groups.fields.grp-name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('grp_name', old('grp_name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('grp_name'))
                        <p class="help-block">
                            {{ $errors->first('grp_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('admin_id', trans('quickadmin.groups.fields.admin').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('admin_id', $admins, old('admin_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('admin_id'))
                        <p class="help-block">
                            {{ $errors->first('admin_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

