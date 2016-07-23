<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/internments')); ?>"><?php echo app('translator')->get('general.internments'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('internment.exportpdf'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">
                	<div class="row">
						<div class="col-md-6 col-md-offset-2">
		                    <button type="submit" id="" onclick="" class="btn btn-warning">
		                        <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('internment.feelingly'); ?>
		                    </button> 
	                	</div>
					</div>
					<br>

					<div class="row">
						<div class="col-md-6 col-md-offset-2">
		                    <button type="submit" id="" onclick="" class="btn btn-warning">
		                        <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('internment.clinic_history_pdf'); ?>
		                    </button> 
	                	</div>
	                </div>
	                <br><br><br><br>

					<div class="row">
						<div class="col-md-6 col-md-offset-6">
		                    <button type="submit" id="" onclick="" class="btn btn-success">
		                        <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('internment.finalize'); ?>
		                    </button> 
	                	</div>
	                </div>
					
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>