<?php $__env->startSection('content'); ?>
<div class="container card-2">
    <p class="title"><?php echo e(__('message.Researchers')); ?></p>
    <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <span>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> <?php echo e($res->{'program_name_' .app()->getLocale()}); ?>

    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="<?php echo e(route('searchresearchers',['id'=>$res->id])); ?>">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="<?php echo e(__('message.research_interests')); ?>">
                    </div>
                </div>
                <!-- <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected> Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary"><?php echo e(__('message.search')); ?></button>
                </div>
            </form>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-0">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href=" <?php echo e(route('detail',Crypt::encrypt($r->id))); ?>">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img class="card-image" src="<?php echo e($r->picture); ?>" alt="">
                    </div>
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; <?php if(app()->getLocale() == 'en' || app()->getLocale() == 'cn' || app()->getLocale() == 'th'): ?> max-height: 220px; <?php else: ?> max-height: 210px;<?php endif; ?>">
                        <div class="card-body">
                            <?php if(app()->getLocale() == 'en'): ?>
                                <?php if($r->doctoral_degree_en == 'Ph.D.'): ?>
                                    <h5 class="card-title"><?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?>, <?php echo e($r->doctoral_degree_en); ?></h5>
                                <?php else: ?>
                                    <h5 class="card-title"><?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?></h5>
                                <?php endif; ?>
                                <h5 class="card-title-2"><?php echo e($r->academic_ranks_en); ?></h5>
                            <?php elseif(app()->getLocale() == 'cn'): ?>
                                <?php if($r->doctoral_degree_cn == '博士'): ?>
                                    <h5 class="card-title"><?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?>, <?php echo e($r->doctoral_degree_cn); ?></h5>
                                <?php else: ?>
                                    <h5 class="card-title"><?php echo e($r->fname_en); ?> <?php echo e($r->lname_en); ?></h5>
                                <?php endif; ?>
                                <h5 class="card-title-2"><?php echo e($r->academic_ranks_cn); ?></h5>
                            <?php else: ?>
                                <?php if($r->doctoral_degree_th == 'ดร.'): ?>
                                    <h5 class="card-title"><?php echo e($r->doctoral_degree_th); ?> <?php echo e($r->fname_th); ?> <?php echo e($r->lname_th); ?></h5>
                                <?php else: ?>
                                    <h5 class="card-title"><?php echo e($r->fname_th); ?> <?php echo e($r->lname_th); ?></h5>
                                <?php endif; ?>
                                <h5 class="card-title-2"><?php echo e($r->academic_ranks_th); ?></h5>
                            <?php endif; ?>

                            <p class="card-text-1"><?php echo e(trans('message.expertise')); ?></p>
                            <div class="card-expertise">
                                <?php $__currentLoopData = $r->expertise->sortBy('expert_name_' .app()->getLocale()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="card-text"> <?php echo e($exper->{'expert_name_' .app()->getLocale()}); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </diV>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/researchers.blade.php ENDPATH**/ ?>