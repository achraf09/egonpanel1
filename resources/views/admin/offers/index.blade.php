@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Angebote hinbzufügen</div>

                <div class="panel-body">
                    Willkommen zu den Angeboten

                    {!! Form::open(['method' => 'POST', 'route' => ['admin.offers.upload'], 'enctype' => 'multipart/form-data']) !!}

                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('offers', 'Angebot', ['class' => 'control-label']) !!}
                            {!! Form::file('offers', ['class' => 'form-control file', 'placeholder' => '', 'accept'=> '.zip,']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('offers'))
                                <p class="help-block">
                                    {{ $errors->first('offers') }}
                                </p>
                            @endif
                        </div>
                    </div>

                    {!! Form::submit('Umwandeln und hochladen', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
