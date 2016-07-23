		<?php echo e(dd($internment->medic_full_name)); ?>


<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="<?php echo asset('bower_components/bootstrap/css/bootstrap.min.css'); ?>" media="all" rel="stylesheet" type="text/css" />
        <title>Example 2</title>
    </head>
    <body>
        <div class="row col-md-12">
        	<div class="col-md-12 ">
        		<label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.clinic_logo'); ?></label>
        	</div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.clinic_name'); ?></label>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.clinic_address'); ?></p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-12 ">
            		<p class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.clinic_phone'); ?></p>
            	</div>
            </div>
            <div class="row col-md-12">
            	<div class="col-md-8 ">
            		<p class="col-md-8 "><?php echo app('translator')->get('internmentfeelingly.clinic_email'); ?></p>
            	</div>
            </div>  
        </div>
        <br><br>
        <!-- FIN ENCABEZADO!-->

        <div class="row ">
            <div class="col-md-6 col-md-offset-3">
                <h2><?php echo app('translator')->get('internmentfeelingly.title_document'); ?></h2> 
            </div>
        </div>
        <br><br>


      <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.first_name'); ?> <?php echo e($internment->patient->first_name); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.last_name'); ?> <?php echo e($internment->patient->last_name); ?></label>
            </div>
		</div>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.medical_insurance'); ?> <?php echo e($internment->patient->last_medical_insurance_name); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.afiliate_number'); ?> <?php echo e($internment->os_affiliate_number); ?></label>
            </div>
		</div>
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.medical_coinsurance'); ?> <?php echo e($internment->patient->last_medical_insurance_name); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.afiliate_number'); ?> <?php echo e($internment->co_affiliate_number); ?></label>
            </div>
		</div>      
        <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.date'); ?> <?php echo e($internment->id); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.time'); ?> <?php echo e($internment->id); ?></label>
            </div>
		</div>     
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.birth_date'); ?> <?php echo e($internment->patient->birth_date); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.birth_town'); ?> <?php echo e($internment->id); ?></label>
            </div>
		</div>
	    <div class="row col-md-12">
            <div class="col-md-4 ">
                <label for="" class="col-md-3 "><?php echo app('translator')->get('internmentfeelingly.age'); ?> <?php echo e($internment->patient->age); ?></label>
            </div>
			<div class="col-md-4 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.civil_status'); ?> <?php echo e($internment->patient->civil_status->name); ?></label>
            </div>
            <div class="col-md-4 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.dni_type'); ?> <?php echo e($internment->patient->dni); ?></label>
            </div>
		</div>   
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.city'); ?> <?php echo e($internment->patient->town); ?></label>
            </div>
        </div>            
	    <div class="row col-md-12">
            <div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.address'); ?> <?php echo e($internment->patient->street_address); ?></label>
            </div>
			<div class="col-md-5 ">
                <label for="" class="col-md-6 "><?php echo app('translator')->get('internmentfeelingly.phone'); ?> <?php echo e($internment->patient->phone); ?></label>
            </div>
		</div>
	    <div class="row col-md-12">
			<div class="col-md-10 ">
                <p align="justify"><?php echo app('translator')->get('internmentfeelingly.feelingly_text'); ?><p>
            </div>	    
		</div>
 

    </body>







<?php echo app('translator')->get('internmentfeelingly.signature_responsible'); ?>
<?php echo app('translator')->get('internmentfeelingly.signature_patient'); ?>
<?php echo app('translator')->get('internmentfeelingly.signature_text'); ?>
<?php echo app('translator')->get('internmentfeelingly.signature_witness'); ?>
<?php echo app('translator')->get('internmentfeelingly.full_name'); ?>
<?php echo app('translator')->get('internmentfeelingly.relationship'); ?>
<?php echo app('translator')->get('internmentfeelingly.responsible_minor_text'); ?>
<?php echo app('translator')->get('internmentfeelingly.signature_responsible_minor'); ?>