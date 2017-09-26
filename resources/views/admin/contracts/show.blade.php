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
                    <a href="{{ route('admin.contracts.download_file', [$contract->records]) }}" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> Download Brochure </a>
                </div>
                <!-- <div id="csvtable" class="col-md-6" style="overflow: auto; height:600px"><h1>Hier wird den Lastgang gezeigt</h1>

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



                </div> -->
                <div id="chart" class="col-md-6" style="width: 800px; height: 600px;">





                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.contracts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
@section('javascript')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300,
                        'is3D' :true};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart'));

        function selectHandler() {
          var selectedItem = chart.getSelection()[0];
          if (selectedItem) {
            var topping = data.getValue(selectedItem.row, 0);
            alert('The user selected ' + topping);
          }
        }
  // Listen for the 'select' event, and call my function selectHandler() when
  // the user selects something on the chart.
  google.visualization.events.addListener(chart, 'select', selectHandler);

        chart.draw(data, options);
      }
    </script>

@endsection
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
