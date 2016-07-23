<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/patients')); ?>"><?php echo app('translator')->get('general.patients'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('general.create_patient'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                   	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/patients')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            
                            <div class="col-md-6 form-group<?php echo e($errors->has('first_name') ? ' has-error' : ''); ?>">
                                <label for="first_name" class="col-md-4 control-label"><?php echo app('translator')->get('patient.first_name'); ?></label>

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
                                <label for="last_name" class="col-md-2 control-label"><?php echo app('translator')->get('patient.last_name'); ?></label>

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

                        <div class="row">
                            <div class="col-md-6 form-group<?php echo e($errors->has('town') ? ' has-error' : ''); ?>">
                                <label for="town" class="col-md-4 control-label"><?php echo app('translator')->get('patient.town'); ?></label>

                                <div class="col-md-8">
                                   
                                    <input id="town_text" placeholder="<?php echo app('translator')->get('general.find_town'); ?>" class="form-control" name="town_text" type="text" value="<?php echo e(old('town_text')); ?>">

                                    <input id="town" placeholder="" name="town" type="text" value="<?php echo e(old('town')); ?>" hidden>


                                    <?php if($errors->has('birth_town')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('birth_town')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6 form-group<?php echo e($errors->has('birth_town') ? ' has-error' : ''); ?>">
                                <label for="birth_town" class="col-md-4 control-label"><?php echo app('translator')->get('patient.birth_town'); ?></label>

                                <div class="col-md-8">
                                   
                                    <input id="birth_town_text" placeholder="<?php echo app('translator')->get('general.find_town'); ?>" class="form-control" name="birth_town_text" type="text" value="<?php echo e(old('birth_town_text')); ?>">

                                    <input id="birth_town" placeholder="" name="birth_town" type="text" value="<?php echo e(old('birth_town')); ?>" hidden>


                                    <?php if($errors->has('birth_town')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('birth_town')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group<?php echo e($errors->has('birth_date') ? ' has-error' : ''); ?>">
                            <label for="birth_date" class="col-md-4 control-label"><?php echo app('translator')->get('patient.birth_date'); ?></label>

                            <div class="col-md-6">

                                <input id="birth_date" type="text" class="form-control" name="birth_date" value="<?php echo e(old('birth_date')); ?>">

                                <?php if($errors->has('birth_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('birth_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 form-group<?php echo e($errors->has('birth_time') ? ' has-error' : ''); ?>">
                            <label for="birth_time" class="col-md-4 control-label"><?php echo app('translator')->get('patient.birth_time'); ?></label>

                            <div class="col-md-6">

                                <input id="birth_time" type="text" class="form-control" name="birth_time" value="<?php echo e(old('birth_time')); ?>">

                                <?php if($errors->has('birth_time')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('birth_time')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-3 form-group<?php echo e($errors->has('civil_status') ? ' has-error' : ''); ?>">
                            <label for="civil_status" class="col-md-6 control-label"><?php echo app('translator')->get('patient.civil_status'); ?></label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="civil_status">

                                    <?php foreach($civil_statuses as $civil_status): ?>

                                        <option value="<?php echo e($civil_status->id); ?>"

                                        <?php if(old('civil_status') == $civil_status->id): ?>
                                                selected
                                        <?php endif; ?>

                                        ><?php echo e($civil_status->name); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('civil_status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('civil_status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-3 form-group<?php echo e($errors->has('blood_type') ? ' has-error' : ''); ?>">
                            <label for="blood_type" class="col-md-6 control-label"><?php echo app('translator')->get('patient.blood_type'); ?></label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="blood_type">

                                    <?php foreach($blood_types as $blood_type): ?>

                                        <option value="<?php echo e($blood_type->id); ?>"

                                        <?php if(old('blood_type') == $blood_type->id): ?>
                                                selected
                                        <?php endif; ?>


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
                   

                        <div class="col-md-3 form-group<?php echo e($errors->has('dni_type') ? ' has-error' : ''); ?>">
                            <label for="dni_type" class="col-md-6 control-label"><?php echo app('translator')->get('patient.dni_type'); ?></label>

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

                        <div class="col-md-4 form-group<?php echo e($errors->has('dni') ? ' has-error' : ''); ?>">
                                <label for="dni" class="col-md-3 control-label"><?php echo app('translator')->get('patient.dni'); ?></label>

                                <div class="col-md-8">
                                    <input id="dni" type="text" class="form-control" name="dni" value="<?php echo e(old('dni')); ?>">

                                    <?php if($errors->has('dni')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('dni')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group<?php echo e($errors->has('street_address') ? ' has-error' : ''); ?>">
                                <label for="street_address" class="col-md-4 control-label"><?php echo app('translator')->get('patient.street_address'); ?></label>

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
                                <label for="phone" class="col-md-4 control-label"><?php echo app('translator')->get('patient.phone'); ?></label>

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

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group<?php echo e($errors->has('dni_copy') ? ' has-error' : ''); ?>">
                                <label for="dni_copy" class="col-md-6 control-label"><?php echo app('translator')->get('patient.dni_copy'); ?></label>

                                <div class="col-md-6">
                                    <input id="dni_copy" type="checkbox" class="form-control" name="dni_copy" value="1"
                                    <?php if(!is_null(old('dni_copy'))): ?>
                                        checked    
                                    <?php endif; ?>

                                    >

                                    <?php if($errors->has('dni_copy')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('dni_copy')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <div class="col-md-6 form-group<?php echo e($errors->has('medical_insurance_copy') ? ' has-error' : ''); ?>">
                                <label for="medical_insurance_copy" class="col-md-4 control-label"><?php echo app('translator')->get('patient.medical_insurance_copy'); ?></label>

                                <div class="col-md-6">
                                    <input id="medical_insurance_copy" type="checkbox" class="form-control" name="medical_insurance_copy" value="1"

                                    <?php if(!is_null(old('medical_insurance_copy'))): ?>
                                        checked    
                                    <?php endif; ?>
                                    >

                                    <?php if($errors->has('medical_insurance_copy')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('medical_insurance_copy')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>

                    <br>

                    <div class="row">

                        <div class="col-md-6 form-group<?php echo e($errors->has('medical_insurance') ? ' has-error' : ''); ?>">
                            <label for="medical_insurance" class="col-md-4 control-label"><?php echo app('translator')->get('patient.medical_insurance'); ?></label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="medical_insurance" data-live-search="true">

                                    <option value=""

                                    <?php if(is_null(old('medical_insurance'))): ?>
                                        selected    
                                    <?php endif; ?>

                                    ><?php echo app('translator')->get('patient.has_no'); ?></option>

                                    <?php foreach($medical_insurances as $medical_insurance): ?>

                                        <option value="<?php echo e($medical_insurance->id); ?>"

                                         <?php if(old('medical_insurance') == $medical_insurance->id): ?>
                                                selected
                                        <?php endif; ?>

                                        ><?php echo e($medical_insurance->name); ?> - <?php echo e($medical_insurance->affiliate_type); ?> - <?php echo e($medical_insurance->module); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('medical_insurance')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('medical_insurance')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                       <div class="col-md-6 form-group<?php echo e($errors->has('mi_affiliate_number') ? ' has-error' : ''); ?>">
                                <label for="mi_affiliate_number" class="col-md-4 control-label"><?php echo app('translator')->get('patient.mi_affiliate_number'); ?></label>

                                <div class="col-md-6">
                                    <input id="mi_affiliate_number" type="text" class="form-control" name="mi_affiliate_number" value="<?php echo e(old('mi_affiliate_number')); ?>">

                                    <?php if($errors->has('mi_affiliate_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('mi_affiliate_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                    </div>

                    <br>

                    <div class="row">


                        <div class="col-md-6 form-group<?php echo e($errors->has('coinsurance') ? ' has-error' : ''); ?>">
                            <label for="coinsurance" class="col-md-2 control-label"><?php echo app('translator')->get('patient.coinsurance'); ?></label>

                            <div class="col-md-6">

                                <select class="form-control selectpicker show-tick" name="coinsurance" data-live-search="true">

                                    <option value=""

                                    <?php if(is_null(old('coinsurance'))): ?>
                                        selected    
                                    <?php endif; ?>
                                    ><?php echo app('translator')->get('patient.has_no'); ?></option>

                                    <?php foreach($coinsurances as $coinsurance): ?>

                                        <option value="<?php echo e($coinsurance->id); ?>"

                                        <?php if(old('coinsurance') == $coinsurance->id): ?>
                                                selected
                                        <?php endif; ?>

                                        ><?php echo e($coinsurance->name); ?> - <?php echo e($coinsurance->affiliate_type); ?> - <?php echo e($coinsurance->module); ?></option>
                                    
                                    <?php endforeach; ?>
                                </select> 

                                <?php if($errors->has('coinsurance')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('coinsurance')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-md-6 form-group<?php echo e($errors->has('c_affiliate_number') ? ' has-error' : ''); ?>">
                                <label for="c_affiliate_number" class="col-md-4 control-label"><?php echo app('translator')->get('patient.c_affiliate_number'); ?></label>

                                <div class="col-md-6">
                                    <input id="c_affiliate_number" type="text" class="form-control" name="c_affiliate_number" value="<?php echo e(old('c_affiliate_number')); ?>">

                                    <?php if($errors->has('c_affiliate_number')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('c_affiliate_number')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>                        
                    </div>

                    <br>
                            
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('general.create_patient'); ?>
                                </button>
                                <a  class="btn btn-warning" href="<?php echo e(URL::previous()); ?>"> <i class="fa fa-btn fa-undo" ></i> <?php echo app('translator')->get('general.cancel_button'); ?></a>

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