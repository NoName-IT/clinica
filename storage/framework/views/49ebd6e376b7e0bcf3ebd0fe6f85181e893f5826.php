<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $__env->make('layouts.topbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                    <a href="<?php echo e(url('/admin/blood_types/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_blood_type'); ?>
                    </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('medic.id'); ?></th>
                            <th><?php echo app('translator')->get('medic.type'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($blood_types as $blood_type): ?>
                                <tr data-id="<?php echo e($blood_type->id); ?>">
                                    <td><?php echo e($blood_type->id); ?></td>
                                    <td><?php echo e($blood_type->name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.blood_types.edit',$blood_type->id)); ?>" class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger" disabled>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    
                     <?php echo $blood_types->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>