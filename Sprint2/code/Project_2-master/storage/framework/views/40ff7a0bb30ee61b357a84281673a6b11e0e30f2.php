<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Book_detail')); ?></h4>
            <p class="card-description"><?php echo e(trans('message.Book_description')); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Book_title')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Book_year')); ?></b></p>
                <?php if(app()->getLocale() == 'th'): ?>
                <p class="card-text col-sm-9"><?php echo e(date('Y', strtotime($paper->ac_year))+543); ?></p>
                <?php else: ?>
                <p class="card-text col-sm-9"><?php echo e(date('Y', strtotime($paper->ac_year))); ?></p>
                <?php endif; ?>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Book_source')); ?></b></p>
                <?php if(app()->getLocale() == 'en'): ?>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_sourcetitle_en); ?></p>
                <?php elseif(app()->getLocale() == 'th'): ?>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_sourcetitle); ?></p>
                <?php elseif(app()->getLocale() == 'cn'): ?>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_sourcetitle_cn); ?></p>
                <?php endif; ?>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Book_page')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($paper->ac_page); ?></p>
            </div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="<?php echo e(route('books.index')); ?>"> <?php echo e(trans('message.Back_button')); ?></a>
            </div>
        </div>

    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/books/show.blade.php ENDPATH**/ ?>