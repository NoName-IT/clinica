<div class="btn-group center" role="group">
    <a class="btn btn-default" href="<?php echo e(url('/admin/medic_types')); ?>">
        <?php echo app('translator')->get('general.medic_types_module'); ?>
    </a>
    <a class="btn btn-default" href="<?php echo e(url('/admin/blood_types')); ?>">
        <?php echo app('translator')->get('general.blood_types_module'); ?>
    </a>
    <a class="btn btn-default" href="<?php echo e(url('/admin/civil_statuses')); ?>">
        <?php echo app('translator')->get('general.civil_statuses_module'); ?>
    </a>
    <a class="btn btn-default" href="<?php echo e(url('/admin/dni_types')); ?>">
        <?php echo app('translator')->get('general.dni_types_module'); ?>
    </a>
    <a class="btn btn-default" href="<?php echo e(url('/admin/relationships')); ?>">
        <?php echo app('translator')->get('general.relationships_module'); ?>
    </a>
    <a class="btn btn-default" href="<?php echo e(url('/admin/discharge_types')); ?>">
        <?php echo app('translator')->get('general.discharge_types_module'); ?>
    </a>
</div>