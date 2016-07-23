<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <ol class="breadcrumb">
                    	<li><a href="<?php echo e(url('/admin/discharge_types')); ?>"><?php echo app('translator')->get('general.discharge_types'); ?></a></li>
                        <li class="active"><?php echo app('translator')->get('general.edit_discharge_type'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">
                    

                	<form class="form-horizontal" role="form" method="POST" action="<?php echo e(URL::route('admin.discharge_types.update', $discharge_type)); ?>">

                        <input type="hidden" name="_method" value="PUT">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label"><?php echo app('translator')->get('medic.type'); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e($discharge_type->name); ?>">

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> <?php echo app('translator')->get('general.edit_discharge_type'); ?>
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