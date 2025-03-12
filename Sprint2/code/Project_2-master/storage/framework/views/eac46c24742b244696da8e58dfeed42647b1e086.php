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
            <div class="card-header"><?php echo e(trans('message.Create_department')); ?>

                <span class="float-right">
                    <a class="btn btn-primary" href="<?php echo e(route('departments.index')); ?>"><?php echo e(trans('message.Back_button')); ?></a>
                </span>
            </div>
            <div class="card-body">
                <?php echo Form::open(array('route' => 'departments.store', 'method'=>'department')); ?>

                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_TH')); ?> :</strong>
                        <?php echo Form::text('department_name_th', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (ไทย)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (TH)' : 
                                            (app()->getLocale() == 'cn' ? '系名称 (中文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]); ?>

                    </div>
                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_EN')); ?>	:</strong>
                        <?php echo Form::text('department_name_en', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (อังกฤษ)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (EN)' : 
                                            (app()->getLocale() == 'cn' ? '部门名称 (英文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]); ?>

                    </div>
                    <div class="form-group">
                        <strong><?php echo e(trans('message.Deapartment_Name_CN')); ?>	:</strong>
                        <?php echo Form::text('department_name_cn', null, [
                            'placeholder' => app()->getLocale() == 'th' ? 'ชื่อสาขาวิชา (จีน)' : 
                                            (app()->getLocale() == 'en' ? 'Department Name (CN)' : 
                                            (app()->getLocale() == 'cn' ? '部门名称 (中文)' : 'Department Name')),
                            'class' => 'form-control'
                        ]); ?>

                    </div>
                    
                    <button type="submit" class="btn btn-primary"><?php echo e(trans('message.Submit_button')); ?></button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/departments/create.blade.php ENDPATH**/ ?>