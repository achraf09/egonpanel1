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

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ansprechpartner hinzufügen
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

          <form class="form-horizontal" id="userForm" method="post" action="{{ route('admin.contactpersons.store') }}">
            {{ csrf_field() }}
            <p class="statusMsg"></p>
              <div class="form-group row">
                <div class="col-sm-offset-2 col-sm-10">
                  <label for="vorname" class="col-sm-2 col-form-label">Vorname*:      </label>
                  <div class="col-sm-10">

                    <input type="text" id="vorname" name="vorname" required placeholder="Vorname" class="form-control">
                  </div>
                </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-offset-2 col-sm-10">
                  <label for="nachname" class="col-sm-2 col-form-label">Nachname*:      </label>
                  <div class="col-sm-10">

                    <input type="text" id="nachname" name="nachname" class="form-control" placeholder="Nachname" required>
                  </div>
                  </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                  <label for="telephone" class="col-sm-2 col-form-label">Telehone:      </label>
                  <div class="col-sm-10">

                    <input type="text" id="telephone" class="form-control" name="telephone" placeholder="Telephone" required>
                  </div>
                  </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                  <label for="position" class="col-sm-2 col-form-label">Position:     </label>
                  <div class="col-sm-10">

                    <input type="text" id="position" class="form-control" name="position" placeholder="Position in der Firma" required>
                  </div>
                  </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-offset-2 col-sm-10">
                      <label for="email" class="col-sm-2 col-form-label">E-Mail:      </label>
                  <div class="col-sm-10">

                    <input type="text" id="email" class="form-control" name="email" placeholder="you@example.com" required>
                  </div>
                  </div>
                  </div>
                  <input type="hidden" name="suppliers_id" value="{{ $supplier->id }}">

                <div class="modal-footer">

                  <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button><!-- <button type="button" class="btn btn-default submitBtn" onclick="submitContactForm()">Speichern Ansprechpartner</button> -->
                  </div>
                </form>
                </div>




              </div>
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


            <!---------------------------------------------------------------------------->



            <!---------------------------------------------------------------------------->

            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
    @section('javascript')
        <script>
        function submitContactForm(){
          var CSRF_HEADER = 'X-CSRF-Token';

          var setCSRFToken = function(securityToken) {
              jQuery.ajaxPrefilter(function(options, _, xhr) {
                  if ( !xhr.crossDomain )
                      xhr.setRequestHeader(CSRF_HEADER, securityToken);
              });
          };
          setCSRFToken($('meta[name="csrf-token"]').attr('content'));
          var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
          var vorname = $('#vorname').val();
          var nachname = $('#nachname').val();
          var email = $('#email').val();
          var position = $('#position').val();
          var telephone = $('#telephone').val();
          var supp_id = <?php echo json_encode($supplier->id) ?>;
          console.log(supp_id);
          if(vorname.trim() == '' ){
            alert('Bitte die Vorname eingeben.');
            $('#vorname').focus();
            return false;
          }else if(nachname.trim() == '' ){
            alert('Bitte die Nachname eingeben.');
            $('#nachname').focus();
            return false;
          }else if(email.trim() == '' ){
            alert('Bitte die Email eingeben .');
            $('#email').focus();
            return false;
          }else if(email.trim() != '' && !reg.test(email)){
            alert('Bitte eine gültige Email-Adresse eingeben.');
            $('#email').focus();
            return false;
          }else if(position.trim() == '' ){
            alert('Bitte die Position eingeben.');
            $('#position').focus();
            return false;
          }else if(telephone.trim() == '' ){
            alert('Bitte die Telefonnummer eingeben.');
            $('#telephone').focus();
            return false;
          }else {
            $.ajax({
              type:'POST',
              url: '../contactpersons',//"{{ route('admin.contactpersons.store') }}",
              data:{'vorname':vorname,'nachname': nachname,'email':email,'position':position, 'telephone' : telephone, 'suppliers_id': supp_id},
              //dataType: 'json',
              // _token: '{{ csrf_token() }}',
              // beforeSend: function () {
              //   $('.submitBtn').attr("disabled","disabled");
              //   $('.modal-body').css('opacity', '.5');
              // },
              success: function(data){
                console.log(data);
                // if(msg == 'ok'){
                //   $('#vorname').val('');
                //   $('#nachname').val('');
                //   $('#email').val('');
                //   $('#position').val('');
                //   $('#telephone').val('');
                //   $('.statusMsg').html('<span style="color:green;">Den Ansprechpartner ist eingestellt</p>');
                // }else{
                //   $('.statusMsg').html('<span style="color:red;">Fehler!!</span>');
                // }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
              }
            });
          }
        }
        </script>
    @endsection
@stop
