<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="<?php echo asset('bower_components/bootstrap/css/bootstrap.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
        <title>Example 2</title>
    </head>
    <body>
        <div class="row col-md-12">
        	<div class="col-md-12 ">
        		<label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.clinic_logo'); ?></label>
        	</div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.clinic_name'); ?></label>
                    <label for="" class="col-md-3 col-md-offset-9 "><?php echo app('translator')->get('clinic_history.head_right'); ?></label>

            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 "><?php echo app('translator')->get('clinic_history.clinic_address'); ?></p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 "><?php echo app('translator')->get('clinic_history.clinic_phone'); ?></p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-6 ">
            		<p class="col-md-6 "><?php echo app('translator')->get('clinic_history.clinic_email'); ?></p>
            	</div>
            </div>  
        </div>
        <br><br>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4">
                <h2><?php echo app('translator')->get('clinic_history.title_document'); ?></h2> 
            </div>
        </div>
        <br><br>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-2 "><?php echo app('translator')->get('clinic_history.medical_insurance'); ?> <?php echo e($internment->patient->last_medical_insurance_name); ?></label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 "><?php echo app('translator')->get('clinic_history.afiliate_number'); ?> </label><p><?php echo e($internment->id); ?></p>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 "><?php echo app('translator')->get('clinic_history.history_number'); ?> <?php echo e($internment->clinic_history); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-8 ">
                <label for="" class="col-md-8 "><?php echo app('translator')->get('clinic_history.full_name'); ?> <?php echo e($internment->patient->full_name); ?></label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-4 "><?php echo app('translator')->get('clinic_history.age'); ?>  <?php echo e($internment->patient->age); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.initial_date'); ?> <?php echo e($internment->initial_date); ?></label>
            </div>
            <div class="col-md-6 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.final_date'); ?> <?php echo e($internment->final_date == '0000-00-00 00:00:00' ? ' Continua internado' : $internment->final_date); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-12 ">
                <label for="" class="col-md-12 "><?php echo app('translator')->get('clinic_history.diagnostic'); ?> <?php echo e($internment->diagnostic); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.personal_history'); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.current_status'); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.current_medication'); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.pronostic'); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="lead col-md-12 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.observations'); ?></label>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6  col-md-offset-6">
                <div></div>
                <label for="" class="col-md-6 "><?php echo app('translator')->get('clinic_history.responsible_professional_signature'); ?></label>
            </div>
        </div>   
    </body>