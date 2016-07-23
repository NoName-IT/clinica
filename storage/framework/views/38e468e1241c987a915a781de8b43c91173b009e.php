<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.patients'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                     <a href="<?php echo e(url('/patients/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_patient'); ?>
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('general.id'); ?></th>
                            <th><?php echo app('translator')->get('general.full_name'); ?></th>
                            <th><?php echo app('translator')->get('general.dni'); ?></th>
                            <th><?php echo app('translator')->get('general.birth_date'); ?></th>
                            <th><?php echo app('translator')->get('general.age'); ?></th>
                            <th><?php echo app('translator')->get('general.civil_status'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($patients as $patient): ?>
                                <tr data-id="<?php echo e($patient->id); ?>">
                                    <td><?php echo e($patient->id); ?></td>
                                    <td><?php echo e($patient->full_name); ?></td>
                                    <td><?php echo e($patient->dni); ?></td>
                                    <td><?php echo e($patient->birth_date); ?></td>
                                    <td><?php echo e($patient->age); ?></td>
                                    <td><?php echo e($patient->civil_status->name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('patients.edit',$patient->id)); ?>" class="btn btn-warning">
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

                    
                     <?php echo $patients->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/patients/:MY_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>