<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Research_project_detail')); ?></h4>
            <p class="card-description"><?php echo e(trans('message.Research_project_description')); ?></p>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_start')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_start); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_end')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->project_end); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_name')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->fund->fund_name); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_budget')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->budget); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_note')); ?></b></p>
                <p class="card-text col-sm-9"><?php echo e($researchProject->note); ?></p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_status.Title')); ?></b></p>
                <?php if($researchProject->status == 1): ?>
                <p class="card-text col-sm-9"><?php echo e(trans('message.Research_project_status.Request')); ?></p>
                <?php elseif($researchProject->status == 2): ?>
                <p class="card-text col-sm-9"><?php echo e(trans('message.Research_project_status.Progress')); ?></p>
                <?php else: ?>
                <p class="card-text col-sm-9"><?php echo e(trans('message.Research_project_status.Close')); ?></p>
                <?php endif; ?>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_responsible')); ?></b></p>
                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 1): ?>
                <p class="card-text col-sm-9">
                    <?php echo e($user->{'position_' . app()->getLocale()} ?? $user->position_en); ?> 
                    <?php echo e($user->{'fname_' . app()->getLocale()} ?? $user->fname_en); ?> 
                    <?php echo e($user->{'lname_' . app()->getLocale()} ?? $user->lname_en); ?>

                </p>

                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b><?php echo e(trans('message.Research_project_member')); ?></b></p>
                <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 2): ?>
                <p class="card-text col-sm-9"><?php echo e($user->position_th); ?><?php echo e($user->fname_th); ?> <?php echo e($user->fname_th); ?>

				<?php if(!$loop->last): ?>,<?php endif; ?>
                <?php endif; ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php $__currentLoopData = $researchProject->outsider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if( $user->pivot->role == 2): ?>
                ,<?php echo e($user->title_name); ?><?php echo e($user->fname); ?> <?php echo e($user->fname); ?></p>
				<?php if(!$loop->last): ?>,<?php endif; ?>
                <?php endif; ?>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="pull-right mt-5">
                <a class="btn btn-primary" href="<?php echo e(route('researchProjects.index')); ?>"><?php echo e(trans('message.Back_button')); ?></a>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_projects/show.blade.php ENDPATH**/ ?>