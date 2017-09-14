@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contracts.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.contracts.store'], 'enctype' => 'multipart/form-data']) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
          <!-- <h4>  @lang('quickadmin.qa_create')</h4> -->
          <h4>Anlegen</h4>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contractsname', trans('quickadmin.contracts.fields.contractsname').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('contractsname', old('contractsname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contractsname'))
                        <p class="help-block">
                            {{ $errors->first('contractsname') }}
                        </p>
                    @endif
                </div>
            </div>

            <!-- New From Elements -->

            <div class="row">
              <div class="col-xs-12 form-group">
                {!! Form::label('salutation', 'Anrede', ['class' => 'control-label']) !!}
                {!! Form::select('salutation', ['H' => 'Herr', 'Fr.' => 'Frau', 'Dr.' => 'Doktor'], 'H', ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                <p class="help-block"></p>
                @if($errors->has('salutation'))
                <p class="help-block">
                  {{ $errors->first('salutation') }}
                </p>
                @endif
              </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('firstname', 'Vorname', ['class' => 'control-label']) !!}
                    {!! Form::text('firstname', null, ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('firstname'))
                        <p class="help-block">
                            {{ $errors->first('firstname') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lastname', 'Nachname', ['class' => 'control-label']) !!}
                    {!! Form::text('lastname', null, ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lastname'))
                        <p class="help-block">
                            {{ $errors->first('lastname') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('ziehler', 'Zihler', ['class' => 'control-label']) !!}
                    {!! Form::text('ziehler', null, ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('ziehler'))
                        <p class="help-block">
                            {{ $errors->first('ziehler') }}
                        </p>
                    @endif
                </div>
            </div>






            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('records', 'Lastenheft', ['class' => 'control-label']) !!}
                    {!! Form::file('records', ['class' => 'form-control file', 'placeholder' => '', 'required' => '', 'accept'=> '.csv', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('records'))
                        <p class="help-block">
                            {{ $errors->first('records') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('telephone', 'Tel.', ['class' => 'control-label']) !!}
                    {!! Form::text('telephone', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('mobil', 'Mobil', ['class' => 'control-label']) !!}
                    {!! Form::text('mobil', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('fax', 'Fax', ['class' => 'control-label']) !!}
                    {!! Form::text('fax', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('telephone')  )
                        <p class="help-block">
                            {{ $errors->first('telephone') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
              <div class="col-xs-12 form-group">
              <h4>{!! Form::label('consumption', 'Verbrauch', ['class' => 'control-label']) !!}</h4>
              </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('consumption_ht', 'HT', ['class' => 'control-label']) !!}
                    {!! Form::number('consumption_ht', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    {!! Form::label('consumption_nt', 'NT', ['class' => 'control-label']) !!}
                    {!! Form::number('consumption_nt', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('consumption')  )
                        <p class="help-block">
                            {{ $errors->first('consumption') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('netzbetrieber', 'Netzbetrieber', ['class' => 'control-label']) !!}
                    {!! Form::text('netzbetrieber', null, ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('netzbetrieber'))
                        <p class="help-block">
                            {{ $errors->first('netzbetrieber') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="row">
              <div class="col-xs-12 form-group">
              <h4>{!! Form::label('spannung', 'Spannungsnetz', ['class' => 'control-label']) !!}</h4>
              </div>
            </div>


            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('spannungsnetz_ms', 'MS', ['class' => 'control-label']) !!}
                    {!! Form::number('spannungsnetz_ms', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    {!! Form::label('spannungsnetz_hs', 'HS', ['class' => 'control-label']) !!}
                    {!! Form::number('spannungsnetz_hs', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('spannung')  )
                        <p class="help-block">
                            {{ $errors->first('spannung') }}
                        </p>
                    @endif
                </div>
            </div>













            <!-- New From Elements -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end_date', trans('quickadmin.contracts.fields.end-date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('end_date', old('end_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('end_date'))
                        <p class="help-block">
                            {{ $errors->first('end_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('owner_id', trans('quickadmin.contracts.fields.owner').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('owner_id', $owners, old('owner_id'), ['class' => 'form-control select2', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('owner_id'))
                        <p class="help-block">
                            {{ $errors->first('owner_id') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
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
