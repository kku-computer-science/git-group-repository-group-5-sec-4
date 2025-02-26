<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<h3 style="padding-top: 10px;"><?php echo e(trans('message.Welcome')); ?></h3>
<br>
<h4>
    <?php echo e(trans('message.Welcome_hello')); ?> 
    <?php if(app()->getLocale() == 'th'): ?>
        <?php echo e(Auth::user()->position_th); ?> <?php echo e(Auth::user()->fname_th); ?> <?php echo e(Auth::user()->lname_th); ?>

    <?php elseif(app()->getLocale() == 'en'): ?>
        <?php echo e(Auth::user()->position_en); ?> <?php echo e(Auth::user()->fname_en); ?> <?php echo e(Auth::user()->lname_en); ?>

    <?php elseif(app()->getLocale() == 'cn'): ?>
        <?php echo e(Auth::user()->position_cn); ?> <?php echo e(Auth::user()->fname_cn); ?> <?php echo e(Auth::user()->lname_cn); ?>

    <?php endif; ?>
</h4>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/dashboards/users/index.blade.php ENDPATH**/ ?>