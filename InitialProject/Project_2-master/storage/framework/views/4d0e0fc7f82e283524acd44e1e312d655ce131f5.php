<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if(\Session::has('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e(\Session::get('success')); ?></p>
    </div>
    <?php endif; ?>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.User_detail')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.User_description')); ?></p>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_full_name_th')); ?></b></h6>
                    <h6 class="col-md-9"><?php echo e($user->title_name_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_full_name_en')); ?></b></h6>
                    <h6 class="col-md-9"><?php echo e($user->title_name_en); ?> <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?></h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_full_name_cn')); ?></b></h6>
                    <h6 class="col-md-9"><?php echo e($user->title_name_cn); ?> <?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?></h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_email')); ?>:</b></h6>
                    <h6 class="col-md-9"><?php echo e($user->email); ?></h6>
                </div>
                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_role')); ?> </b></h6>
                    <h6 class="col-md-9"><label class="badge badge-dark"><?php echo e($val); ?></label></h6>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($val == "teacher"): ?>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b> <?php echo e(trans('message.User_academic_rank')); ?> </b></h6>
                    <h6 class="col-md-9"><?php if(App::getLocale() == 'th'): ?>
                        <?php echo e($user->academic_ranks_th); ?>

                    <?php elseif(App::getLocale() == 'en'): ?>
                        <?php echo e($user->academic_ranks_en); ?>

                    <?php elseif(App::getLocale() == 'cn'): ?>
                        <?php echo e($user->academic_ranks_ch); ?>

                    <?php endif; ?></h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_department')); ?> </b></h6>
                    <h6 class="col-md-9"><?php echo e($user->program->department->department_name_en); ?></h6>
                </div>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_program')); ?> </b></h6>
                    <h6 class="col-md-9"><?php if(App::getLocale() == 'th'): ?>
                        <?php echo e($user->program->program_name_th); ?>

                    <?php elseif(App::getLocale() == 'en'): ?>
                        <?php echo e($user->program->program_name_en); ?>

                    <?php elseif(App::getLocale() == 'cn'): ?>
                        <?php echo e($user->program->program_name_cn); ?>

                    <?php endif; ?></h6></h6>
                </div>
                
                
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_edu_background')); ?> </b></h6>
                    
                    <h6 class="col-md-4" style="line-height:1.4;"><?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($edu->qua_name); ?> <br><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h6>
                    <h6 class="col-md-5" style="line-height:1.4;"><?php $__currentLoopData = $user->education; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($edu->uname); ?> <br><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></h6>
                </div>
                <?php endif; ?>
                <div class="row mt-2">
                    <h6 class="col-md-3"><b><?php echo e(trans('message.User_passwrord')); ?>:</b></h6>
                    <h6 class="col-md-9"></h6>
                </div>
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                <a class="btn btn-primary btn-sm mt-5" href="<?php echo e(route('users.index')); ?>"><?php echo e(trans('message.Back_button')); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/users/show.blade.php ENDPATH**/ ?>