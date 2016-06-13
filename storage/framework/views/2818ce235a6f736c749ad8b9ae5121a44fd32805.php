<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <ol class="breadcrumb">
                        <li class="active"><?php echo app('translator')->get('general.users'); ?></li>
                    </ol>
                </div>

                <div class="panel-body" >

                     <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <div class='ajax-message'>
                    </div>


                    <a href="<?php echo e(url('/admin/users/create')); ?>" class="btn btn-success">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> <?php echo app('translator')->get('general.create_user'); ?>
                    </a>

                    <div class="users">
                    
                        <table class="table table-striped">
                            <thead>
                                <th><?php echo app('translator')->get('general.id'); ?></th>
                                <th><?php echo app('translator')->get('general.name'); ?></th>
                                <th><?php echo app('translator')->get('general.email'); ?></th>
                                <th><?php echo app('translator')->get('general.actions'); ?></th>
                                <th>
                                    
                                </th>
                                    
                                
                            </thead>
                            <tbody> 
                                <?php foreach($users as $user): ?>
                                    <tr data-id="<?php echo e($user->id); ?>">
                                        <td><?php echo e($user->id); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.users.edit',$user->id)); ?>" class="btn btn-warning">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>
                                            <?php if(Auth::user()->id == $user->id): ?>
                                                <a href="#!" class="btn btn-danger" disabled>
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="" class="btn btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>


                        
                        <?php echo $users->render(); ?>

                    </div>
                   
                </div>

            </div>
        </div>

    </div>
</div>

 <form class="form-horizontal" id="form-delete" role="form" method="POST" action="<?php echo e(url('/admin/users/:USER_ID')); ?>">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" name="_method" value="DELETE">
</form>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>