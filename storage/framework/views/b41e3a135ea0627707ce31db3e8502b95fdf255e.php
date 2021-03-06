<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/internments')); ?>"><?php echo app('translator')->get('general.internments'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('witness.create_witnesses'); ?></li>
                    </ol>
                </div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/witnesses')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <input name="patient_id" value="<?php echo e($patient_id); ?>" hidden></input>
                        <div class="row">
                            <div class="row">
                                <div class="col-md-4 form-group<?php echo e($errors->has('dni') ? ' has-error' : ''); ?>">
                                        <label for="dni" class="col-md-3 control-label"><?php echo app('translator')->get('witness.dni'); ?></label>

                                        <div class="col-md-8">
                                            <input id="dni" type="text" class="form-control" name="dni" value="<?php echo e(old('dni')); ?>">

                                            <?php if($errors->has('dni')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('dni')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                <div class="col-md-3 form-group<?php echo e($errors->has('dni_type') ? ' has-error' : ''); ?>">
                                    <label for="dni_type" class="col-md-6 control-label"><?php echo app('translator')->get('witness.dni_type'); ?></label>

                                    <div class="col-md-6">

                                        <select class="form-control selectpicker show-tick" name="dni_type">

                                            <?php foreach($dni_types as $dni_type): ?>

                                                <option value="<?php echo e($dni_type->id); ?>"

                                                <?php if(old('dni_type') == $dni_type->id): ?>
                                                        selected
                                                <?php endif; ?>

                                                ><?php echo e($dni_type->name); ?></option>
                                            
                                            <?php endforeach; ?>
                                        </select> 

                                        <?php if($errors->has('dni_type')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('dni_type')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                            </div>                             
                            </div>      
                            <div class="row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                    <label for="first_name" class="col-md-4 control-label"><?php echo app('translator')->get('witness.first_name'); ?></label>

                                    <div class="col-md-8">
                                        <input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>">

                                        <?php if($errors->has('first_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('first_name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group<?php echo e($errors->has('last_name') ? ' has-error' : ''); ?>">
                                    <label for="last_name" class="col-md-2 control-label"><?php echo app('translator')->get('witness.last_name'); ?></label>

                                    <div class="col-md-8">
                                        <input id="last_name" type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>">

                                        <?php if($errors->has('last_name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <br>

                        
                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group<?php echo e($errors->has('birth_date') ? ' has-error' : ''); ?>">
                                <label for="birth_date" class="col-md-4 control-label"><?php echo app('translator')->get('witness.birth_date'); ?></label>

                                <div class="col-md-6">

                                    <input id="birth_date" type="text" class="form-control" name="birth_date" value="<?php echo e(old('birth_date')); ?>">

                                    <?php if($errors->has('birth_date')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('birth_date')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('age') ? ' has-error' : ''); ?>">
                                <label for="age" class="col-md-4 control-label"><?php echo app('translator')->get('witness.age'); ?></label>

                                <div class="col-md-6">

                                    <input id="age" type="text" class="form-control" name="age" value="<?php echo e(old('age')); ?>">

                                    <?php if($errors->has('age')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('age')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div class="row">

                            <div class="col-md-6 form-group<?php echo e($errors->has('street_address') ? ' has-error' : ''); ?>">
                                    <label for="street_address" class="col-md-4 control-label"><?php echo app('translator')->get('witness.street_address'); ?></label>

                                    <div class="col-md-8">
                                        <input id="street_address" type="text" class="form-control" name="street_address" value="<?php echo e(old('street_address')); ?>">

                                        <?php if($errors->has('street_address')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('street_address')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('phone') ? ' has-error' : ''); ?>">
                                    <label for="phone" class="col-md-4 control-label"><?php echo app('translator')->get('witness.phone'); ?></label>

                                    <div class="col-md-8">
                                        <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>">

                                        <?php if($errors->has('phone')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('phone')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                        </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('relationship') ? ' has-error' : ''); ?>">
                                <label for="relationship" class="col-md-2 control-label"><?php echo app('translator')->get('witness.relationship'); ?></label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="relationship" data-live-search="true">

                                        <option value=""

                                        <?php if(is_null(old('relationship'))): ?>
                                            selected    
                                        <?php endif; ?>
                                        ><?php echo app('translator')->get('witness.has_no'); ?></option>

                                        <?php foreach( $relationships as $relationship): ?>

                                            <option value="<?php echo e($relationship->id); ?>"

                                            <?php if(old('relationship') == $relationship->id): ?>
                                                    selected
                                            <?php endif; ?>

                                            ><?php echo e($relationship->name); ?></option>
                                        
                                        <?php endforeach; ?>
                                    </select> 

                                    <?php if($errors->has('relationship')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('relationship')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <br>

                    </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                              <a  class="btn btn-warning" href="<?php echo e(URL::previous()); ?>"> <i class="fa fa-btn fa-undo" ></i> <?php echo app('translator')->get('witness.goback'); ?></a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('witness.create_witnesses'); ?>
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