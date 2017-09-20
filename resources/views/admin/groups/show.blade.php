@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.groups.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.groups.fields.grp-name')</th>
                            <td field-key='grp_name'>{{ $group->grp_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.groups.fields.admin')</th>
                            <td field-key='admin'>{{ $group->admin->name.' '.$group->admin->lastname }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

<div role="tabpanel" class="tab-pane active" id="users">
<table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.lastname')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.birthdate')</th>
                        <th>@lang('quickadmin.users.fields.address')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>@lang('quickadmin.users.fields.profilphoto')</th>
                        <th>@lang('quickadmin.users.fields.group')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td field-key='name'>{{ $user->name }}</td>
                                <td field-key='lastname'>{{ $user->lastname }}</td>
                                <td field-key='email'>{{ $user->email }}</td>
                                <td field-key='birthdate'>{{ $user->birthdate }}</td>
                                <td field-key='address'>{{ $user->address }}</td>
                                <td field-key='role'>{{ $user->role->title or '' }}</td>
                                <td field-key='profilphoto'>@if($user->profilphoto)<a href="{{ asset(env('UPLOAD_PATH').'/' . $user->profilphoto) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $user->profilphoto) }}"/></a>@endif</td>
                                <td field-key='group'>{{ $user->group->grp_name or '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('user_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.restore', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('user_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.perma_del', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('user_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.users.destroy', $user->id])) !!}
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

            <a href="{{ route('admin.groups.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
