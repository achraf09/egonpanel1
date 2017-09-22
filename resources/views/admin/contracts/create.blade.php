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
                    {!! Form::label('f_name', 'Vorname', ['class' => 'control-label']) !!}
                    {!! Form::text('f_name', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('f_name'))
                        <p class="help-block">
                            {{ $errors->first('f_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('l_name', 'Nachname', ['class' => 'control-label']) !!}
                    {!! Form::text('l_name', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('l_name'))
                        <p class="help-block">
                            {{ $errors->first('l_name') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('addresse', 'Addresse', ['class' => 'control-label']) !!}
                    {!! Form::text('addresse', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('addresse'))
                        <p class="help-block">
                            {{ $errors->first('addresse') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('zihlerpunktnummer', 'Zählepunktnummer', ['class' => 'control-label']) !!}
                    {!! Form::number('zihlerpunktnummer', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('records', 'Lastgang', ['class' => 'control-label']) !!}
                    {!! Form::file('records', ['class' => 'form-control file', 'placeholder' => '', 'required' => '', 'accept'=> '.csv']) !!}
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
                    {!! Form::label('mobile', 'Mobil', ['class' => 'control-label']) !!}
                    {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
                    {!! Form::label('consumption_HT', 'HT', ['class' => 'control-label']) !!}
                    {!! Form::number('consumption_HT', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    {!! Form::label('consumption_NT', 'NT', ['class' => 'control-label']) !!}
                    {!! Form::number('consumption_NT', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
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
                    {!! Form::label('powersupplier', 'Netzbetrieber', ['class' => 'control-label']) !!}
                    {!! Form::text('powersupplier', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('powersupplier'))
                        <p class="help-block">
                            {{ $errors->first('powersupplier') }}
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
                    {!! Form::label('tension_MS', 'MS', ['class' => 'control-label']) !!}
                    {!! Form::number('tension_MS', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    {!! Form::label('tension_HS', 'HS', ['class' => 'control-label']) !!}
                    {!! Form::number('tension_HS', null, ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'step' =>'0.001','min' => '0']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('spannung')  )
                        <p class="help-block">
                            {{ $errors->first('spannung') }}
                        </p>
                    @endif
                </div>
            </div>


<!-- ############################################################################################################################################################ -->

<!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Datei ausgewählt</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>




<!-- ############################################################################################################################################################# -->



            <!-- New From Elements -->
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('end_date', trans('quickadmin.contracts.fields.end-date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('end_date', old('end_date'), ['class' => 'form-control date', 'placeholder' => '', 'required' => '', 'minDate'=>'0']) !!}
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
            minDate: 0,
            dateFormat: "{{ config('app.date_format_js') }}"
        });

        // var fileInput = document.getElementById("records"),
        //
        //     readFile = function () {
        //         var reader = new FileReader();
        //         reader.onload = function () {
        //             document.getElementById('myModal').innerHTML = reader.result;
        //         };
        //         // start reading the file. When it is done, calls the onload event defined above.
        //         reader.readAsBinaryString(fileInput.files[0]);
        //     };

        // fileInput.addEventListener('change', readFile);

       $("#records").change(function(){
          //     function () {
          console.log('File read!');
          // };
        $('#myModal').modal('show');
     });


    </script>


@stop
