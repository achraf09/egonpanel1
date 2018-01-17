@extends('layouts.app')

@section('content')
    <h3 class="page-title">Ansprechpartner</h3>

    {!! Form::model($contactperson, ['method' => 'PUT', 'route' => ['admin.contactpersons.update', $contactperson->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
          <div class="row">
              <div class="col-xs-12 form-group">
                  {!! Form::label('vorname', 'Vorname'.'*', ['class' => 'control-label']) !!}
                  {!! Form::text('vorname', old('vorname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                  <p class="help-block"></p>
                  @if($errors->has('vorname'))
                      <p class="help-block">
                          {{ $errors->first('vorname') }}
                      </p>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 form-group">
                  {!! Form::label('nachname', 'Nachname'.'*', ['class' => 'control-label']) !!}
                  {!! Form::text('nachname', old('nachname'), ['class' => 'form-control', 'required' => '']) !!}
                  <p class="help-block"></p>
                  @if($errors->has('nachname'))
                      <p class="help-block">
                          {{ $errors->first('nachname') }}
                      </p>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 form-group">
                  {!! Form::label('', 'Telefonnummer'.'*', ['class' => 'control-label']) !!}
                  {!! Form::text('telephone', old('telephone'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                  <p class="help-block"></p>
                  @if($errors->has('telephone'))
                      <p class="help-block">
                          {{ $errors->first('telephone') }}
                      </p>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 form-group">
                  {!! Form::label('position', 'Position'.'*', ['class' => 'control-label']) !!}
                  {!! Form::text('position', old('position'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                  <p class="help-block"></p>
                  @if($errors->has('position'))
                      <p class="help-block">
                          {{ $errors->first('position') }}
                      </p>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 form-group">
                  {!! Form::label('email', 'Email'.'*', ['class' => 'control-label']) !!}
                  {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                  <p class="help-block"></p>
                  @if($errors->has('email'))
                      <p class="help-block">
                          {{ $errors->first('email') }}
                      </p>
                  @endif
              </div>
          </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "{{ config('app.date_format_js') }}"
        });
    </script>

@stop
