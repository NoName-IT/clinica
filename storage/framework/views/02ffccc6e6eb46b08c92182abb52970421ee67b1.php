<br>

<br>
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
                                <div class="col-md-6 form-group<?php echo e($errors->has('') ? ' has-error' : ''); ?>">
                                    <label for="diagnostic_2" class="col-md-4 control-label"><?php echo app('translator')->get('internment.diagnostic_2'); ?></label>

                                    <div class="col-md-8">
                                        <input id="diagnostic_2" type="text" class="form-control" name="diagnostic_2" value="<?php echo e($internment->diagnostic_2); ?>">

                                        <?php if($errors->has('diagnostic_2')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('diagnostic_2')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('') ? ' has-error' : ''); ?>">
                                    <label for="initial_date" class="col-md-4 control-label"><?php echo app('translator')->get('internment.initial_date'); ?></label>

                                    <div class="col-md-8">
                                        <input id="initial_date" type="text" class="form-control" name="initial_date" value="<?php echo e($internment->initial_date); ?>">

                                        <?php if($errors->has('initial_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('initial_date')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group<?php echo e($errors->has('') ? ' has-error' : ''); ?>">
                                    <label for="final_date" class="col-md-4 control-label"><?php echo app('translator')->get('internment.final_date'); ?></label>

                                    <div class="col-md-8">
                                        <input id="final_date" type="text" class="form-control" name="final_date" value="<?php echo e($internment->final_date); ?>">

                                        <?php if($errors->has('final_date')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('final_date')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" form-group<?php echo e($errors->has('room') ? ' has-error' : ''); ?>">
                                    <label for="room" class="col-md-2 control-label"><?php echo app('translator')->get('internment.room'); ?></label>

                                    <div class="col-md-1">
                                        <input id="room" type="number" class="form-control" name="room" value="<?php echo e($internment->room); ?>">

                                        <?php if($errors->has('room')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('room')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>                        
                            </div>           
                            <div class="row">
                                <div class="col-md-6 form-group<?php echo e($errors->has('medic') ? ' has-error' : ''); ?>">
                                    <label for="medic" class="col-md-4 control-label"><?php echo app('translator')->get('internment.medic'); ?></label>

                                    <div class="col-md-6">

                                        <select class="form-control selectpicker show-tick" name="medic">

                                            <?php foreach($medics as $medic): ?>

                                                <option value="<?php echo e($medic->id); ?>" 
                                                        <?php if($internmentMedicId != null ): ?>
                                                            <?php if( $medic->id == $internmentMedicId->id ): ?>
                                                                selected
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    ><?php echo e($medic->full_name); ?>

                                                </option>
                                            
                                            <?php endforeach; ?>
                                        </select> 

                                        <?php if($errors->has('medic')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('medic')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6 form-group<?php echo e($errors->has('psychologist') ? ' has-error' : ''); ?>">
                                    <label for="psychologist" class="col-md-4 control-label"><?php echo app('translator')->get('internment.psychologist'); ?></label>

                                    <div class="col-md-6">

                                        <select class="form-control selectpicker show-tick" name="psychologist">

                                            <?php foreach($psychologists as $psychologist): ?>

                                                <option value="<?php echo e($psychologist->id); ?>" 
                                                    <?php if($internmentPsychologistId != null): ?>
                                                        <?php if($psychologist->id == $internmentPsychologistId->id): ?>
                                                            selected
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    ><?php echo e($psychologist->full_name); ?>

                                                </option>
                                            
                                            <?php endforeach; ?>
                                        </select> 

                                        <?php if($errors->has('psychologist')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('psychologist')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                    <div class="row">

                            <div class="col-md-6 form-group<?php echo e($errors->has('discharge_type') ? ' has-error' : ''); ?>">
                                <label for="discharge_type" class="col-md-4 control-label"><?php echo app('translator')->get('internment.discharge_type'); ?></label>

                                <div class="col-md-6">

                                    <select class="form-control selectpicker show-tick" name="discharge_type">

                                        <?php foreach($discharge_types as $discharge_type): ?>

                                            <option value="<?php echo e($discharge_type->id); ?>"

                                            <?php if($internment->discharge_type == $discharge_type->id): ?>
                                                    selected
                                            <?php endif; ?>

                                            ><?php echo e($discharge_type->name); ?></option>
                                        
                                        <?php endforeach; ?>
                                    </select> 

                                    <?php if($errors->has('discharge_type')): ?>
                                        <span class="help-block">
                                            <strong><?php echo e($errors->first('discharge_type')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <br>                   
                    </div>
                            
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="complaint" class="col-md-4 control-label"><?php echo app('translator')->get('internment.complaint'); ?></label>
                                    <div class="col-md-6">
                                        <input type="file" name="datafile" size="40">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label for="complaint_high" class="col-md-4 control-label"><?php echo app('translator')->get('internment.complaint_high'); ?></label>
                                    <div class="col-md-6">
                                        <input type="file" name="datafile" size="40">
                                    </div>                          
                                </div>
                                <div class="col-md-6 ">

                                </div>
                            </div>        
                            <br>                    

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a  class="btn btn-warning" href="<?php echo e(URL::previous()); ?>"> <i class="fa fa-btn fa-undo" ></i> <?php echo app('translator')->get('internment.goback'); ?></a>
                          
                                <button type="submit" id="complete" onclick="complete()" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('internment.update'); ?>
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