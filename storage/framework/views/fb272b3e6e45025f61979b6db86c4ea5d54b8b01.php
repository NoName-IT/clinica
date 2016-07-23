<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.medical_insurances'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                     <a href="<?php echo e(url('/medical_insurances/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_medical_insurance'); ?>
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('medical_insurance.name'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.affiliate_type'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.module'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.available_days'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.renovation_days'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.price_per_day'); ?></th>
                            <th><?php echo app('translator')->get('medical_insurance.coverage'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($medical_insurances as $medical_insurance): ?>
                                <tr data-id="<?php echo e($medical_insurance->id); ?>">
                                    <td><?php echo e($medical_insurance->name); ?></td>
                                    <td><?php echo e($medical_insurance->affiliate_type); ?></td>
                                    <td><?php echo e($medical_insurance->module); ?></td>
                                    <td><?php echo e($medical_insurance->available_days); ?></td>
                                    <td><?php echo e($medical_insurance->renovation_days); ?></td>
                                    <td><?php echo e($medical_insurance->price_per_day); ?></td>
                                    <td><?php echo e($medical_insurance->coverage); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('medical_insurances.edit',$medical_insurance->id)); ?>" class="btn btn-warning">
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

                    
                     <?php echo $medical_insurances->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/medical_insurances/:MY_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>