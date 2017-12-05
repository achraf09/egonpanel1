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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
            </div>


            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ansprechpartner hinzufügen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form class="form-horizontal" id="userForm" style="display:none" method="post">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <label for="vorname" class="col-sm-2 control-label">Vorname*:</label>
                  <input type="text" name="vorname" required placeholder="Vorname" class="form-control">
                </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <label for="nachname" class="col-sm-2 control-label">Nachname*:</label>
                  <input type="text" name="nachname" class="form-control" placeholder="Nachname" required>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                  <label for="telephone" class="col-sm-2 control-label">Telehone:</label>
                  <input type="text" class="form-control" name="telephone" placeholder="Telephone" required>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                  <label for="position" class="col-sm-2 control-label">Position</label>
                  <input type="text" class="form-control" name="position" placeholder="Position in der Firma" required>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                  <label for="email" class="col-sm-2 control-label">E-Mail:</label>
                  <input type="text" class="form-control" name="email" placeholder="email" required>
                  </div>
                  </div>


                <div class="modal-footer">
                  <button type="submit" class="btn btn-default">Speichern Ansprechpartner</button>
                  </div>
                </form>
                </div>




              </div>
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
