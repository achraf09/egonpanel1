@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td field-key='name'>{{ $user->vorname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.lastname')</th>
                            <td field-key='lastname'>{{ $user->nachname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Telefonnummer</th>
                            <td field-key='birthdate'>{{ $user->telephone }}</td>
                        </tr>
                        <!-- <tr>
                            <th>E-Mail</th>
                            <td field-key='address'>{{ $user->email }}</td>
                        </tr> -->
                        <tr>
                            <th>Position</th>
                            <td field-key='role'>{{ $user->position }}</td>
                        </tr>
                        <!-- <tr> -->
                            <!-- <th>@lang('quickadmin.users.fields.profilphoto')</th> -->
                            <!-- <td field-key='profilphoto'>@if($user->profilphoto)<a href="{{ asset(env('UPLOAD_PATH').'/' . $user->profilphoto) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $user->profilphoto) }}"/></a>@endif</td> -->
                        <!-- </tr> -->
                        <!-- <tr> -->
                            <th>Firma</th>
                            <td>{{ $supplier[0] }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<!-- <ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#useractions" aria-controls="useractions" role="tab" data-toggle="tab">User actions</a></li>
<li role="presentation" class=""><a href="#groups" aria-controls="groups" role="tab" data-toggle="tab">Gruppenverwaltung</a></li>
<li role="presentation" class=""><a href="#contracts" aria-controls="contracts" role="tab" data-toggle="tab">Verträge</a></li>
</ul> -->



            <p>&nbsp;</p>

            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
