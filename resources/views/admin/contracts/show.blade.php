@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.contracts.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.contracts.fields.contractsname')</th>
                            <td field-key='contractsname'>{{ $contract->contractsname }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contracts.fields.end-date')</th>
                            <td field-key='end_date'>{{ $contract->end_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.contracts.fields.owner')</th>
                            <td field-key='owner'>{{ $contract->salutation.'. '.$contract->f_name.' '.$contract->l_name }}<!--$contract->owner->name  }}--></td>
                        </tr>
                        <!-- <tr> -->
                            <!-- <th>@lang('quickadmin.users.fields.lastname')</th> -->
                            <!-- <td field-key='lastname'>{{ isset($contract->owner) ? $contract->owner->lastname : '' }}</td> -->
                        <!-- </tr> -->
                        <tr>
                          <th>Ziehlerpunknummer</th>
                          <td field-key="ziehlerpunktnummer">{{ $contract->zihlerpunktnummer}}</td>
                        </tr>
                        <tr>
                          <th>Telephone</th>
                          <td>{{ $contract->telephone }}</td>
                        </tr>
                        <tr>
                          <th>Mobile</th>
                          <td>{{ $contract->mobile }}</td>
                        </tr>
                        <tr>
                          <th>Fax</th>
                          <td>{{ $contract->fax }}</td>
                        </tr>
                        <tr>
                          <th>Verbrauch </th>

                          <td>

                                <strong>HT :</strong> {{ $contract->consumption_HT }}

                              <hr>

                              <strong>NT :</strong>{{ $contract->consumption_NT }}

                          </td>

                        </tr>
                        <tr>
                          <th>Netzbetrieber</th>
                          <td>{{ $contract->powersupplier }}</td>
                        </tr>
                        <tr>
                          <th>Spannung</th>
                          <td>
                            <strong>MS :</strong>{{ $contract->tension_MS }}
                            <hr>
                            <strong>HS :</strong>{{ $contract->tension_HS }}
                          </td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contracts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
