@extends('layouts.app')

@section('content')
    <h3 class="page-title">Versorger</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.suppliers.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Name', 'Versorgername'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('Name',old('Name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('anschrift', 'Anschrift'.'*', ['class' => 'control-label']) !!}
                    {!! Form::text('anschrift',old('anschrift'),['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('Name'))
                        <p class="help-block">
                            {{ $errors->first('Name') }}
                        </p>
                    @endif
                </div>

            </div>



              </div>
            <!-- <div class="row"> -->
                <!-- <div class="col-xs-12 form-group"> -->
                    {{-- {!! Form::label('admin_id', trans('quickadmin.groups.fields.admin').'*', ['class' => 'control-label']) !!} --}}
                    {{-- {!! Form::select('admin_id', $admins, old('admin_id'), ['class' => 'form-control select2', 'required' => '']) !!} --}}
                    {{-- <p class="help-block"></p> --}}
                    {{-- @if($errors->has('admin_id')) --}}
                        <!-- <p class="help-block"> -->
                            {{-- {{ $errors->first('admin_id') }} --}}
                        <!-- </p> -->
                    {{-- @endif --}}
                <!-- </div> -->
            <!-- </div> -->

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    <script>
        @can('supplier_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.suppliers.mass_destroy') }}'; @endif
        @endcan
        $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.suppliers.index') !!}?show_deleted={{ request('show_deleted') }}';
            window.dtDefaultOptions.columns = [
                @can('supplier_delete')
                @if ( request('show_deleted') != 1 )
                    {data: 'massDelete', name: 'id', searchable: false, sortable: false},
                @endif
                @endcan
                {data: 'Name', name: 'Name'},
                {data: 'anschrift', name: 'anschrift'},
                // {data: 'admin.lastname', lastname: 'admin.lastname'},
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection
