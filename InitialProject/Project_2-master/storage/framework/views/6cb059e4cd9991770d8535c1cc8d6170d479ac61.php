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
        <div class="card col-8" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Edit_role')); ?></h4>
                <?php echo Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'PATCH']); ?>

                <div class="form-group row">
                    <p class="col-sm-3"><?php echo e(trans('message.Role_name')); ?>:</p>
                    <div class="col-sm-8">
                        <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <p class="col-sm-3"><?php echo e(trans('message.Role_permission')); ?> </p>
                    <div class="col-sm-9">
                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?>

                            <?php echo e($value->name); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-5"><?php echo e(trans('message.Submit_button')); ?></button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('roles.index')); ?>"><?php echo e(trans('message.Back_button')); ?></a>
                <?php echo Form::close(); ?>



            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/roles/edit.blade.php ENDPATH**/ ?>