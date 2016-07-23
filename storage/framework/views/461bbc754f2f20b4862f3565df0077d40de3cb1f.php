<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.coinsurances'); ?></li>
                    </ol>
                </div>

                <div class="panel-body">

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                     <div class='ajax-message'>
                    </div>

                     <a href="<?php echo e(url('/coinsurances/create')); ?>" class="btn btn-success">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_coinsurance'); ?>
                        </a>
                    
                    <table class="table table-striped">
                        <thead>
                            <th><?php echo app('translator')->get('coinsurance.name'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.affiliate_type'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.module'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.available_days'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.renovation_days'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.price_per_day'); ?></th>
                            <th><?php echo app('translator')->get('coinsurance.coverage'); ?></th>
                            <th>
                                
                            </th>
                                
                            
                        </thead>
                        <tbody> 
                            <?php foreach($coinsurances as $coinsurance): ?>
                                <tr data-id="<?php echo e($coinsurance->id); ?>">
                                    <td><?php echo e($coinsurance->name); ?></td>
                                    <td><?php echo e($coinsurance->affiliate_type); ?></td>
                                    <td><?php echo e($coinsurance->module); ?></td>
                                    <td><?php echo e($coinsurance->available_days); ?></td>
                                    <td><?php echo e($coinsurance->renovation_days); ?></td>
                                    <td><?php echo e($coinsurance->price_per_day); ?></td>
                                    <td><?php echo e($coinsurance->coverage); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('coinsurances.edit',$coinsurance->id)); ?>" class="btn btn-warning">
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

                    
                     <?php echo $coinsurances->render(); ?>

                   
                </div>

            </div>
        </div>

    </div>
</div>

<form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/coinsurances/:MY_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>