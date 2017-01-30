<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.internments'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                     <a href="<?php echo e(url('/internments/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_internment'); ?>
                        </a>

                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('internment.order_number'); ?></th>

                            <th><?php echo app('translator')->get('internment.patient_full_name'); ?></th>
                            <th><?php echo app('translator')->get('internment.diagnostic'); ?></th>
                            <th><?php echo app('translator')->get('internment.room'); ?></th>
                            <th><?php echo app('translator')->get('internment.clinic_history'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($internments as $internment): ?>
                                <tr data-id="<?php echo e($internment->id); ?>">
                                    <td><?php echo e($internment->id); ?></td>                                
                                    <td><?php echo e($internment->patient->full_name); ?></td>
                                    <td><?php echo e(str_limit($internment->diagnostic, $limit = 20, $end = '...')); ?></td>
                                    <td><?php echo e($internment->room); ?></td>
                                    <td><?php echo e($internment->patient->clinic_history); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('internments.edit',$internment->id)); ?>" class="btn btn-warning">
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

                    
                     <?php echo $internments->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/internments/:MY_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>