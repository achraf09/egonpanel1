@extends('layouts.app')

@section('content')
    <h3 class="page-title">Versorger</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Versorgername</th>
                            <td field-key='supplier_name'>{{ $supplier->Name }}</td>
                        </tr>
                        <tr>
                            <th>Anschrift</th>
                            <td field-key='anschrift'>{{ $supplier->anschrift }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#contact_persons" aria-controls="contact_persons" role="tab" data-toggle="tab">Ansprechpartner</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="contact_persons">
<table class="table table-bordered table-striped {{ count($contact_persons) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.lastname')</th>
                        <th>Telephone</th>
                        <th>Position</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <!-- <th>@lang('quickadmin.contact_persons.fields.address')</th>
                        <th>@lang('quickadmin.contact_persons.fields.role')</th>
                        <th>@lang('quickadmin.contact_persons.fields.profilphoto')</th>
                        <th>@lang('quickadmin.contact_persons.fields.group')</th> -->
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($contact_persons) > 0)
            @foreach ($contact_persons as $contact_person)
                <tr data-entry-id="{{ $contact_person->id }}">
                    <td field-key='name'>{{ $contact_person->vorname }}</td>
                                <td field-key='lastname'>{{ $contact_person->nachname }}</td>
                                <td field-key='email'>{{ $contact_person->telephone }}</td>
                                <td field-key='position'>{{ $contact_person->position }}</td>
                                <td field-key='email'>{{ $contact_person->email }}</td>
                                <!-- <td field-key='role'>{{ $contact_person->role->title or '' }}</td> -->
                                <!-- <td field-key='profilphoto'>@if($contact_person->profilphoto)<a href="{{ asset(env('UPLOAD_PATH').'/' . $contact_person->profilphoto) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $contact_person->profilphoto) }}"/></a>@endif</td> -->
                                <td field-key='supplier'>{{ $contact_person->supplier->name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('contactpersons_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contactpersons.restore', $contact_person->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('contaperson_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contactpersons.perma_del', $contact_person->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('contactpersons_view')
                                    <a href="{{ route('admin.contactpersons.show',[$contact_person->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('contactpersons_edit')
                                    <a href="{{ route('admin.contactpersons.edit',[$contact_person->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('contactpersons_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.contactpersons.destroy', $contact_person->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="15">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
