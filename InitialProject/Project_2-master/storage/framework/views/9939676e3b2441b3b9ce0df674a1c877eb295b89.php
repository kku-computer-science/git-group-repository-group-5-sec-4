<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card col-md-8" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Fund_detail')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.Fund_detail_description')); ?></p>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_name')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_year')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($fund->fund_year); ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_detail')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($fund->fund_details); ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_type')); ?></b></p>
                    <p class="card-text col-sm-9">
                        <?php if(App::getLocale() == 'th'): ?>
                            <?php if($fund->fund_type == 'ทุนภายใน'): ?>
                                <?php echo e(trans('message.internal_fund')); ?>

                            <?php elseif($fund->fund_type == 'ทุนภายนอก'): ?>
                                <?php echo e(trans('message.external_fund')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'en'): ?>
                            <?php if($fund->fund_type == 'ทุนภายใน'): ?>
                                <?php echo e(trans('message.internal_fund')); ?>

                            <?php elseif($fund->fund_type == 'ทุนภายนอก'): ?>
                                <?php echo e(trans('message.external_fund')); ?>

                            <?php endif; ?>
                        <?php elseif(App::getLocale() == 'cn'): ?>
                            <?php if($fund->fund_type == 'ทุนภายใน'): ?>
                                <?php echo e(trans('message.internal_fund')); ?>

                            <?php elseif($fund->fund_type == 'ทุนภายนอก'): ?>
                                <?php echo e(trans('message.external_fund')); ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    </p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_level')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($fund->fund_level); ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Fund_organization')); ?></b></p>
                    <p class="card-text col-sm-9"><?php echo e($fund->fund_name); ?></p>
                </div>
                <div class="row">
                    <p class="card-text col-sm-3"><b><?php echo e(trans('message.Add_detail_fund_by')); ?></b></p>
                    <?php if(App::getLocale() == 'th'): ?>
                    <p class="card-text col-sm-9"><?php echo e($fund->user->fname_th); ?> <?php echo e($fund->user->lname_th); ?></p>
                    <?php elseif(App::getLocale() == 'en'): ?>
                    <p class="card-text col-sm-9"><?php echo e($fund->user->fname_en); ?> <?php echo e($fund->user->lname_en); ?></p>
                    <?php elseif(App::getLocale() == 'cn'): ?>
                    <p class="card-text col-sm-9"><?php echo e($fund->user->fname_cn); ?> <?php echo e($fund->user->lname_cn); ?></p>
                    <?php endif; ?>
                </div>
                <div class="pull-right mt-5">
                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('funds.index')); ?>">
                        <?php echo e(trans('message.Back_button')); ?></a>
                </div>
            </div>

        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/funds/show.blade.php ENDPATH**/ ?>