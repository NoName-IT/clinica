<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.medics'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                     <a href="<?php echo e(url('/medics/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_medic'); ?>
                        </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('medic.first_name'); ?></th>
                            <th><?php echo app('translator')->get('medic.last_name'); ?></th>
                            <th><?php echo app('translator')->get('medic.medic_type'); ?></th>
                            <th><?php echo app('translator')->get('medic.cuit'); ?></th>
                            <th><?php echo app('translator')->get('medic.dni'); ?></th>
                            <th><?php echo app('translator')->get('medic.license'); ?></th>
                            <th><?php echo app('translator')->get('medic.blood_type'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($medics as $medic): ?>
                                <tr data-id="<?php echo e($medic->id); ?>">
                                    <td><?php echo e($medic->first_name); ?></td>
                                    <td><?php echo e($medic->last_name); ?></td>
                                    <td><?php echo e($medic->medic_type->name); ?></td>
                                    <td><?php echo e($medic->cuit); ?></td>
                                    <td><?php echo e($medic->dni); ?></td>
                                    <td><?php echo e($medic->license); ?></td>
                                    <td><?php echo e($medic->blood_type->name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('medics.edit',$medic->id)); ?>" class="btn btn-warning">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    
                     <?php echo $medics->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/medics/:MY_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>