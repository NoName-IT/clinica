<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/medics')); ?>"><?php echo app('translator')->get('general.medics'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('general.edit_medic'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                   	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(URL::route('medics.update', $medic)); ?>">

                        <input type="hidden" name="_method" value="PUT">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                <label for="first_name" class="col-md-4 control-label"><?php echo app('translator')->get('medic.first_name'); ?></label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e($medic->first_name); ?>">

                                    <?php if($errors->has('first_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('first_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                                <label for="last_name" class="col-md-4 control-label"><?php echo app('translator')->get('medic.last_name'); ?></label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e($medic->last_name); ?>">

                                    <?php if($errors->has('last_name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('last_name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                        <div class="form-group<?php echo e($errors->has('blood_type') ? ' has-error' : ''); ?>">
                            <label for="blood_type" class="col-md-4 control-label"><?php echo app('translator')->get('medic.blood_type'); ?></label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="blood_type">

                                    <?php foreach($blood_types as $blood_type): ?>

                                        <option value="<?php echo e($blood_type->id); ?>"
                                        <?php echo e(($medic->blood_type->id == $blood_type->id ? "selected":"")); ?>

                                        ><?php echo e($blood_type->name); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('blood_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('blood_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('medic_type') ? ' has-error' : ''); ?>">
                            <label for="medic_type" class="col-md-4 control-label"><?php echo app('translator')->get('medic.medic_type'); ?></label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="medic_type">

                                    <?php foreach($medic_types as $medic_type): ?>

                                        <option value="<?php echo e($medic_type->id); ?>"
                                        <?php echo e(($medic->medic_type->id == $medic_type->id ? "selected":"")); ?>

                                        ><?php echo e($medic_type->name); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('medic_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('medic_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('cuit') ? ' has-error' : ''); ?>">
                                <label for="cuit" class="col-md-4 control-label"><?php echo app('translator')->get('medic.cuit'); ?></label>

                                <div class="col-md-4">
                                    <input id="cuit" type="text" class="form-control" name="cuit" value="<?php echo e($medic->cuit); ?>">

                                    <?php if($errors->has('cuit')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('cuit')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                         <div class="form-group<?php echo e($errors->has('dni') ? ' has-error' : ''); ?>">
                                <label for="dni" class="col-md-4 control-label"><?php echo app('translator')->get('medic.dni'); ?></label>

                                <div class="col-md-4">
                                    <input id="dni" type="text" class="form-control" name="dni" value="<?php echo e($medic->dni); ?>">

                                    <?php if($errors->has('dni')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('dni')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                         <div class="form-group<?php echo e($errors->has('license') ? ' has-error' : ''); ?>">
                                <label for="license" class="col-md-4 control-label"><?php echo app('translator')->get('medic.license'); ?></label>

                                <div class="col-md-4">
                                    <input id="license" type="text" class="form-control" name="license" value="<?php echo e($medic->license); ?>">

                                    <?php if($errors->has('license')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('license')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="form-group<?php echo e($errors->has('street_address') ? ' has-error' : ''); ?>">
                                <label for="street_address" class="col-md-4 control-label"><?php echo app('translator')->get('medic.street_address'); ?></label>

                                <div class="col-md-4">
                                    <input id="street_address" type="text" class="form-control" name="street_address" value="<?php echo e($medic->street_address); ?>">

                                    <?php if($errors->has('street_address')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('street_address')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                        <div class="form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                <label for="phone" class="col-md-4 control-label"><?php echo app('translator')->get('medic.phone'); ?></label>

                                <div class="col-md-4">
                                    <input id="phone" type="phone" class="form-control" name="phone" value="<?php echo e($medic->phone); ?>">

                                    <?php if($errors->has('phone')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('phone')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>    

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                <label for="email" class="col-md-4 control-label"><?php echo app('translator')->get('medic.email'); ?></label>

                                <div class="col-md-4">
                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e($medic->email); ?>">

                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>                            


                            
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('general.edit_medic'); ?>
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