<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Research_group_detail')); ?></h4>
            <p class="card-description"><?php echo e(trans('message.Research_group_description')); ?></p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_name_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_th); ?></p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_name_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_en); ?></p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_name_cn')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_name_cn); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_description_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_description_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_description_cn')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_desc_cn); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_detail_th')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_th); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_detail_en')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_en); ?></p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_detail_cn')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchGroup->group_detail_cn); ?></p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_head')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 1): ?>
                                    <?php if(App::getLocale() == 'en'): ?>
                                        <?php echo e($user->position_en); ?> <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?>

                                    <?php elseif(App::getLocale() == 'th'): ?>
                                        <?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                    <?php elseif(App::getLocale() == 'cn'): ?>
                                        <?php echo e($user->position_cn); ?> <?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?>

                                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   </p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_group_member')); ?></b></p>
                <p class="card-text col-sm-9">
                    <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if( $user->pivot->role == 2): ?>
                        <?php
                            $position = trim($user->{'position_' . app()->getLocale()} ?? '');
                            $fname = trim($user->{'fname_' . app()->getLocale()} ?? '');
                            $lname = trim($user->{'lname_' . app()->getLocale()} ?? '');

                            // รวมค่าให้เว้นวรรคอย่างถูกต้อง (ไม่มีช่องว่างเกิน)
                            $fullName = implode(' ', array_filter([$position, $fname, $lname]));
                        ?>

                        <?php echo e($fullName); ?><br>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></p>
            </div>
            <a class="btn btn-primary mt-5" href="<?php echo e(route('researchGroups.index')); ?>"> <?php echo e(trans('message.Back_button')); ?></a>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<script>
$(document).ready(function() {

    /* When click New customer button */
    $('#new-customer').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
    /* When click New customer button */
    $('#new-customer2').click(function() {
        $('#btn-save').val("create-customer");
        $('#customer').trigger("reset");
        $('#customerCrudModal').html("Add New Customer EiEi");
        $('#crud-modal').modal('show');
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_groups/show.blade.php ENDPATH**/ ?>