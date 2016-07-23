<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/medical_insurances')); ?>"><?php echo app('translator')->get('general.medical_insurances'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('general.create_medical_insurance'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                   	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/medical_insurances')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                                <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.name'); ?></label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>">

                                    <?php if($errors->has('name')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('name')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                        <div class="form-group<?php echo e($errors->has('affiliate_type') ? ' has-error' : ''); ?>">
                            <label for="affiliate_type" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.affiliate_type'); ?></label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="affiliate_type">

                                    <?php foreach($affiliate_types as $affiliate_type): ?>

                                        <option value="<?php echo e($affiliate_type); ?>"
                                        <?php echo e((old("affiliate_type") == $affiliate_type ? "selected":"")); ?>

                                        ><?php echo e($affiliate_type); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('affiliate_type')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('affiliate_type')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('module') ? ' has-error' : ''); ?>">
                            <label for="module" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.module'); ?></label>

                            <div class="col-md-2">

                                <select class="form-control selectpicker show-tick" name="module">

                                    <?php foreach($modules as $module): ?>

                                        <option value="<?php echo e($module); ?>"
                                        <?php echo e((old("module") == $module ? "selected":"")); ?>

                                        ><?php echo e($module); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('module')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('module')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('available_days') ? ' has-error' : ''); ?>">
                                <label for="available_days" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.available_days'); ?></label>

                                <div class="col-md-2">
                                    <input id="available_days" type="text" class="form-control" name="available_days" value="<?php echo e(old('available_days')); ?>">

                                    <?php if($errors->has('available_days')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('available_days')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                         <div class="form-group<?php echo e($errors->has('renovation_days') ? ' has-error' : ''); ?>">
                                <label for="renovation_days" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.renovation_days'); ?></label>

                                <div class="col-md-2">
                                    <input id="renovation_days" type="text" class="form-control" name="renovation_days" value="<?php echo e(old('renovation_days')); ?>">

                                    <?php if($errors->has('renovation_days')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('renovation_days')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="form-group<?php echo e($errors->has('price_per_day') ? ' has-error' : ''); ?>">
                                <label for="price_per_day" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.price_per_day'); ?></label>

                                <div class="col-md-2">
                                    <input id="price_per_day" type="text" class="form-control" name="price_per_day" value="<?php echo e(old('price_per_day')); ?>">

                                    <?php if($errors->has('price_per_day')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('price_per_day')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="form-group<?php echo e($errors->has('coverage') ? ' has-error' : ''); ?>">
                                <label for="coverage" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.coverage'); ?></label>

                                <div class="col-md-2">
                                    <input id="coverage" type="text" class="form-control" name="coverage" value="<?php echo e(old('coverage')); ?>">

                                    <?php if($errors->has('coverage')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('coverage')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="form-group<?php echo e($errors->has('iva') ? ' has-error' : ''); ?>">
                                <label for="iva" class="col-md-4 control-label"><?php echo app('translator')->get('medical_insurance.iva'); ?></label>

                                <div class="col-md-2">
                                    <input id="iva" type="text" class="form-control" name="iva" value="<?php echo e(old('iva')); ?>">

                                    <?php if($errors->has('iva')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('iva')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('general.create_medical_insurance'); ?>
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