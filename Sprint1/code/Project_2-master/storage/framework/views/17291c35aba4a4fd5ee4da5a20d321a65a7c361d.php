<!-- <?php
   if(Auth::user()->hasRole('admin')) {
      $layoutDirectory = 'dashboards.admins.layouts.admin-dash-layout';
   } else {
      $layoutDirectory = 'dashboards.users.layouts.user-dash-layout';
   }
?> -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="justify-content-center">
        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong><?php echo e(trans('message.error_input.Whoops')); ?></strong> <?php echo e(trans('message.error_input.Error_problem')); ?><br><br>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header"><?php echo e(trans('message.Edit_department')); ?>

                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('departments.index')); ?>"><?php echo e(trans('message.Back_button')); ?></a>
                </span>
            </div>
            <div class="card-body">
                <?php echo Form::model($department, ['route' => ['departments.update', $department->id], 'method'=>'PATCH']); ?>

                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_TH')); ?>:</strong>
                        <?php echo Form::text('department_name_th', null, array('placeholder' => 'Department Name TH','class' => 'form-control')); ?>

                    </div>
                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_EN')); ?>:</strong>
                        <?php echo Form::text('department_name_en', null, array('placeholder' => 'Department Name EN','class' => 'form-control')); ?>

                    </div>
                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_CN')); ?>:</strong>
                        <?php echo Form::text('department_name_cn', null, array('placeholder' => 'Department Name CN','class' => 'form-control')); ?>

                    </div>
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('message.Submit_button')); ?></button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/departments/edit.blade.php ENDPATH**/ ?>