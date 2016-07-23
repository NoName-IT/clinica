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

                    <a href="<?php echo e(url('/admin/civil_statuses/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_civil_status'); ?>
                    </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('medic.id'); ?></th>
                            <th><?php echo app('translator')->get('medic.type'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($civil_statuses as $civil_status): ?>
                                <tr data-id="<?php echo e($civil_status->id); ?>">
                                    <td><?php echo e($civil_status->id); ?></td>
                                    <td><?php echo e($civil_status->name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('admin.civil_statuses.edit',$civil_status->id)); ?>" class="btn btn-warning">
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

                    
                     <?php echo $civil_statuses->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>