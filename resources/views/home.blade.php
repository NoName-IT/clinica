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
                        <div class="col-md-6" id="donut-graph1" style="height: 250px;"></div>
                        <div class="col-md-6" id="donut-graph2" style="height: 250px;"></div>
                    </div>

                    <div class="col-md-12"><hr></div>

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8"><h2 class="text-center">@lang('general.internments')</h2></div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8" id="line-graph1" style="height: 300px;"></div>
                        <div class="col-md-2"></div>
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

                    new Morris.Line({

                      element: 'line-graph1',

                      data: data.graph3,

                      xkey: 'year',

                      ykeys: ['value'],

                      labels: ['Pacientes']
                    });


                }
            });

    });

</script>

@endsection
