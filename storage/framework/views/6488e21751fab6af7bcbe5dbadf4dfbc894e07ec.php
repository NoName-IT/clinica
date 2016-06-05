<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->get('general.home'); ?></div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6"><h2 class="text-center"><?php echo app('translator')->get('general.medical_insurances'); ?></h2></div>
                        <div class="col-md-6"><h2 class="text-center"><?php echo app('translator')->get('general.coinsurances'); ?></h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="donut-graph1" style="height: 300px;"></div>
                        <div class="col-md-6" id="donut-graph2" style="height: 300px;"></div>
                    </div>

                    <div class="col-md-12"><hr></div>

                    <div class="row">
                        <div class="col-md-6"><h2 class="text-center"><?php echo app('translator')->get('general.internments'); ?></h2></div>
                        <div class="col-md-6"><h2 class="text-center"><?php echo app('translator')->get('general.coinsurances'); ?></h2></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6" id="line-graph1" style="height: 300px;"></div>
                        <div class="col-md-6" id="area-example" style="height: 300px;"></div>
                    </div>                    
                </div>

            </div>
        </div>

    </div>
</div>



<script>

    $(document).ready(function (){

            var url = "<?php echo e(URL::route("dashboard")); ?>/";

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>