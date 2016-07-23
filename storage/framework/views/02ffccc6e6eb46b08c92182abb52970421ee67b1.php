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

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('internments/confirm')); ?>">

                        <?php echo e(csrf_field()); ?>


                        <input id="internment_id" type="text"  name="internment_id" value="<?php echo e($internment->id); ?>" hidden="">
                        
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('') ? ' has-error' : ''); ?>">
                                    <label for="diagnostic" class="col-md-4 control-label"><?php echo app('translator')->get('internment.diagnostic'); ?></label>

                                    <div class="col-md-8">
                                        <input id="diagnostic" type="text" class="form-control" name="diagnostic" value="<?php echo e($internment->diagnostic); ?>">

                                        <?php if($errors->has('diagnostic')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('diagnostic')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group<?php echo e($errors->has('room') ? ' has-error' : ''); ?>">
                                    <label for="rootm" class="col-md-2 control-label"><?php echo app('translator')->get('internment.room'); ?></label>

                                    <div class="col-md-8">
                                        <input id="room" type="text" class="form-control" name="room" value="<?php echo e($internment->room); ?>">

                                        <?php if($errors->has('room')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('room')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group<?php echo e($errors->has('clinic_history') ? ' has-error' : ''); ?>">
                                <label for="clinic_history" class="col-md-4 control-label"><?php echo app('translator')->get('internment.clinic_history'); ?></label>
                                <div class="col-md-6">

                                    <input id="clinic_history" type="text" class="form-control" name="clinic_history" value="<?php echo e($internment->clinic_history); ?>">

                                    <?php if($errors->has('clinic_history')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('clinic_history')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6 form-group<?php echo e($errors->has('medic') ? ' has-error' : ''); ?>">
                                <label for="medic" class="col-md-6 control-label"><?php echo app('translator')->get('internment.medic'); ?></label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="medic">

                                        <?php foreach($medics as $medic): ?>

                                            <option value="<?php echo e($medic->id); ?>"

                                            <?php if($internmentMedicId == $medic->id): ?>
                                                    selected
                                            <?php endif; ?>

                                            ><?php echo e($medic->full_name); ?></option>
                                        
                                        <?php endforeach; ?>
                                    </select> 

                                    <?php if($errors->has('medic')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('medic')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <br>

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