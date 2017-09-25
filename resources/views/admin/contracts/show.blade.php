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
                <div id="csvtable" class="col-md-6" style="overflow: auto; height:600px"><h1>Hier wird den Lastgang gezeigt</h1>

                  <table class="table table-bordered table-striped">
                    @foreach($file_contents as $line_content)
                    <tr>
                      <td>{{ $line_content[0] }}</td>
                      <td>{{ $line_content[1] }}</td>
                      <td>{{ $line_content[2] }}</td>
                      <td>{{ $line_content[3] }}</td>
                      <td>{{ $line_content[4] }}</td>
                      <td>{{ $line_content[5] }}</td>
                    </tr>

                    @endforeach


                  </table>



                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contracts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop

<!-- @section('javascript')
<script src="d3.min.js?v=3.2.8"></script>

    <script>
    d3.text("data.csv", function(data) {
            var parsedCSV = d3.csv.parseRows(data);

            var container = d3.select("#csvtable")
                .append("table")

                .selectAll("tr")
                    .data(parsedCSV).enter()
                    .append("tr")

                .selectAll("td")
                    .data(function(d) { return d; }).enter()
                    .append("td")
                    .text(function(d) { return d; });
        });
    </script>
@endsection -->
