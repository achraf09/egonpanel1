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
                <div class="col-md-6" >
                  <button class="chart-update" data-chart-name="chart2" style="align: right;">Nächste Monat</button>
                  <div id="chart"style="width: 800px; height: 600px;">


                  </div>





                </div>
            </div>
          </div>
        </div>
          <div class="panel panel-default">

          <div class="panel-body table-responsive">

            <div class="row">
              <!---->
              <div class="col-md-12 box" style="margin-bottom: 0">
                  <div class="box-header orange-background">

                    <div class="actions">
                      <!-- <a class="btn box-remove btn-xs btn-link" href="#"><i class="fa fa-times"></i>
                      </a> -->
                      <!-- <a class="btn box-collapse btn-xs btn-link" href="#"><i></i>
                      </a> -->
                    </div>
                  </div>
                  <div class="box-content">
                    <!-- <strong>Resize window to see responsive tabs.</strong> -->
                    <div class="tabbable" style="margin-top: 20px">
                      <ul class="nav nav-responsive nav-tabs"><li class="dropdown pull-right tabdrop active"><!--<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">-<i class="fa fa-bars"></i> <b class="caret"></b>--></a><ul class="dropdown-menu"><li class="">
                          <!-- <a data-toggle="tab" href="#retab17" aria-expanded="false">
                            Section 17
                          </a>
                        </li><li class="">
                          <a data-toggle="tab" href="#retab18" aria-expanded="false">
                            Section 18
                          </a>
                        </li><li class="">
                          <a data-toggle="tab" href="#retab19" aria-expanded="false">
                            Section 19
                          </a>
                        </li><li class="active">
                          <a data-toggle="tab" href="#retab20" aria-expanded="true">
                            Section 20
                          </a> -->
                        </li></ul></li>
                        <li class="">
                          <a data-toggle="tab" href="#retab1" aria-expanded="false">
                            Januar
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab2" aria-expanded="false">
                            Februar
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab3" aria-expanded="false">
                            März
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab4" aria-expanded="false">
                            April
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab5" aria-expanded="false">
                            Mai
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab6" aria-expanded="false">
                            Juni
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab7" aria-expanded="false">
                            Juli
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab8" aria-expanded="false">
                            August
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab9" aria-expanded="false">
                            September
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab10" aria-expanded="false">
                            Oktober
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab11" aria-expanded="false">
                            November
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab12" aria-expanded="false">
                            Dezember
                          </a>
                        </li>
                        <!-- <li class="">
                          <a data-toggle="tab" href="#retab13" aria-expanded="false">
                            Section 13
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab14" aria-expanded="false">
                            Section 14
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab15" aria-expanded="false">
                            Section 15
                          </a>
                        </li>
                        <li class="">
                          <a data-toggle="tab" href="#retab16" aria-expanded="false">
                            Section 16
                          </a>
                        </li> -->




                      </ul>
                      <div class="tab-content">
                        <div id="retab1" class="tab-pane active"><p>bin im Section 1.</p>
                        </div>
                        <div id="retab2" class="tab-pane"><p>Section 2.</p>
                        </div>
                        <div id="retab3" class="tab-pane"><p> Section 3.</p>
                        </div>
                        <div id="retab4" class="tab-pane"><p>Section 4.</p>
                        </div>
                        <div id="retab5" class="tab-pane" style="width: 800px; height: 600px;"><p>Section 5.</p>
                        </div>
                        <div id="retab6" class="tab-pane"><p>Section 6.</p>
                        </div>
                        <div id="retab7" class="tab-pane"><p><?php echo $file_contents[8][3] ?> </p>
                        </div>
                        <div id="retab8" class="tab-pane"><p>Section 8.</p>
                        </div>
                        <div id="retab9" class="tab-pane"><p>Section 9.</p>
                        </div>
                        <div id="retab10" class="tab-pane"><p> Section 10.</p>
                        </div>
                        <div id="retab11" class="tab-pane"><p>Section 11.</p>
                        </div>
                        <div id="retab12" class="tab-pane"><p>Section 12.</p>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>


















            <!---->
              <div class="col-md-6" id="chart2" style="width: 800px; height: 600px;">
                </div>
            </div>
          </div>

        <p>&nbsp;</p>

        <a href="{{ route('admin.contracts.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
      </div>
@stop
@include('footervar')
@section('javascript')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https:://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
    var file_content = <?php echo json_encode($file_contents[7]) ?>;
    console.log(file_content);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Lastgang für Januar',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart'));
        function selectHandler() {
    var selectedItem = chart.getSelection()[0];
    if (selectedItem) {
      var value = data.getValue(selectedItem.row, selectedItem.column);
      alert('The user selected ' + value);
    }
  }

  // Listen for the 'select' event, and call my function selectHandler() when
  // the user selects something on the chart.
  google.visualization.events.addListener(chart, 'select', selectHandler);

        chart.draw(data, options);
      }


      google.charts.load('current', {'packages':['corechart']});
    //  google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {
      //  var data = google.visualization.DataTable();
        //   data.addColumn('string',)
        //
        //   ['Year', 'Sales', 'Expenses'],
        //   ['2004',  1000,      400],
        //   ['2005',  1170,      460],
        //   ['2006',  660,       1120],
        //   ['2007',  1030,      540]
        // ]);

        var options = {
          title: 'Lastgang',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('retab5'));
        function selectHandler() {
    var selectedItem = chart.getSelection()[0];
    if (selectedItem) {
      var value = data.getValue(selectedItem.row, selectedItem.column);
      alert('The user selected ' + value);
    }
  }

  // Listen for the 'select' event, and call my function selectHandler() when
  // the user selects something on the chart.
  google.visualization.events.addListener(chart, 'select', selectHandler);

        //chart.draw(data, options);
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
