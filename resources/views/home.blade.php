@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('general.home')</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"><h2 class="text-center">@lang('general.medical_insurances')</h2></div>
                        <div class="col-md-6"><h2 class="text-center">@lang('general.coinsurances')</h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="donut-graph1" style="height: 300px;"></div>
                        <div class="col-md-6" id="donut-graph2" style="height: 300px;"></div>
                    </div>

                    <div class="col-md-12"><hr></div>

                    <div class="row">
                        <div class="col-md-6"><h2 class="text-center">@lang('general.medical_insurances')</h2></div>
                        <div class="col-md-6"><h2 class="text-center">@lang('general.coinsurances')</h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="myfirstchart" style="height: 300px;"></div>
                        <div class="col-md-6" id="area-example" style="height: 300px;"></div>
                    </div>                    
                </div>

            </div>
        </div>

    </div>
</div>



<script>

    $(document).ready(function (){

            var url = "{{ URL::route("dashboard") }}/";

            //alert(root_url);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: url,
                type: 'GET',
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                    //console.log(data.data1);

                    new Morris.Donut({
                      element: 'donut-graph1',
                      data: data.graph1
                    });
                    new Morris.Donut({
                      element: 'donut-graph2',
                      data: data.graph2
                    });
                }
            });

        

            new Morris.Line({
          // ID of the element in which to draw the chart.
          element: 'myfirstchart',
          // Chart data records -- each entry in this array corresponds to a point on
          // the chart.
          data: [
            { year: '2008', value: 20 },
            { year: '2009', value: 10 },
            { year: '2010', value: 5 },
            { year: '2011', value: 5 },
            { year: '2012', value: 20 }
          ],
          // The name of the data record attribute that contains x-values.
          xkey: 'year',
          // A list of names of data record attributes that contain y-values.
          ykeys: ['value'],
          // Labels for the ykeys -- will be displayed when you hover over the
          // chart.
          labels: ['Value']
        });

            new Morris.Area({
          element: 'area-example',
          data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
          ],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Series A', 'Series B']
        });
            new Morris.Bar({
          element: 'bar-example',
          data: [
            { y: '2006', a: 100, b: 90 },
            { y: '2007', a: 75,  b: 65 },
            { y: '2008', a: 50,  b: 40 },
            { y: '2009', a: 75,  b: 65 },
            { y: '2010', a: 50,  b: 40 },
            { y: '2011', a: 75,  b: 65 },
            { y: '2012', a: 100, b: 90 }
          ],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Series A', 'Series B']
        });

    });

</script>

@endsection
