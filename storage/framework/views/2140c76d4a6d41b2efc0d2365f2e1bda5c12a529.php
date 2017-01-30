<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/internments')); ?>"><?php echo app('translator')->get('general.internments'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('internment.complete'); ?></li>
                    </ol>
                </div>
                <div class="panel-body">
                    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('internments/confirm')); ?>">

                        <?php echo e(csrf_field()); ?>


                        <input id="internment_id" type="text"  name="internment_id" value="<?php echo e($internment->id); ?>" hidden="">
                        
                        <div class="row">
                                    <div class="col-md-4 form-group<?php echo e($errors->has('order') ? ' has-error' : ''); ?>">
                                            <label for="order" class="col-md-6 control-label"><?php echo app('translator')->get('internment.order_number'); ?></label>
                                            <div class="col-md-8">
                                                <input id="order" type="text" class="form-control" readonly name="order" value="<?php echo e($internment->order); ?>">
                                                <?php if($errors->has('order')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('order')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                    </div>

                                    <div class="col-md-4 form-group<?php echo e($errors->has('order') ? ' has-error' : ''); ?>">
                                            <label for="order" class="col-md-6 control-label"><?php echo app('translator')->get('internment.clinic_history'); ?></label>
                                            <div class="col-md-8">
                                                <input id="order" type="text" class="form-control" readonly name="order" value="<?php echo e($internment->patient->clinic_history); ?>">
                                                <?php if($errors->has('order')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('order')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                    </div>
                        </div>
                        <div class="row">
                                    <div class="col-md-4 form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                            <label for="name" class="col-md-6 control-label"><?php echo app('translator')->get('internment.patient_full_name'); ?></label>
                                            <div class="col-md-8">
                                                <input id="name" type="text" class="form-control" readonly name="name" value="<?php echo e($internment->patient->full_name); ?>">
                                                <?php if($errors->has('order')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                    </div>

                                    <div class="col-md-4 form-group<?php echo e($errors->has('dni') ? ' has-error' : ''); ?>">
                                            <label for="dni" class="col-md-6 control-label"><?php echo app('translator')->get('general.dni'); ?></label>
                                            <div class="col-md-8">
                                                <input id="dni" type="text" class="form-control" readonly name="dni" value="<?php echo e($internment->patient->dni); ?>">
                                                <?php if($errors->has('dni')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('dni')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                    </div>
                        </div>                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a  class="btn btn-warning" href="<?php echo e(URL::previous()); ?>"> <i class="fa fa-btn fa-undo" ></i> <?php echo app('translator')->get('internment.goback'); ?></a>                         
                                <button type="submit" id="complete" onclick="complete()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('internment.complete'); ?>
                                </button> 
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>