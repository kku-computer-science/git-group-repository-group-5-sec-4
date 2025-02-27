<?php $__env->startSection('content'); ?>
<div class="container card-2">
    <p class="title"> <?php echo e(trans('message.Researchers')); ?> </p>
    <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <span>
        <?php if(app()->getLocale() == 'th'): ?>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> <?php echo e($res->program_name_th); ?>

        <?php elseif(app()->getLocale() == 'en'): ?>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> <?php echo e($res->program_name_en); ?>

        <?php elseif(app()->getLocale() == 'cn'): ?>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> <?php echo e($res->program_name_cn); ?>

        <?php endif; ?>
    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="<?php echo e(route('searchresearchers',['id'=>$res->id])); ?>">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="<?php echo e(trans('message.research_interests')); ?>">
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
                    <button type="submit" class="btn btn-outline-primary"><?php echo e(trans('message.search')); ?></button>
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
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; <?php if(app()->getLocale() == 'en'): ?> max-height: 220px; <?php else: ?> max-height: 210px;<?php endif; ?>">
                        <div class="card-body">
                            <?php
                                $locale = app()->getLocale();

                                // ดึงค่าทั้งภาษาไทยและอังกฤษเสมอ
                                $fname_th = $r->fname_th ?? '';
                                $lname_th = $r->lname_th ?? '';
                                $position_th = $r->position_th ?? '';
                                $doctoral_degree_th = $r->doctoral_degree_th ?? '';

                                $fname_en = $r->fname_en ?? '';
                                $lname_en = $r->lname_en ?? '';
                                $position_en = $r->position_en ?? '';
                                $doctoral_degree_en = $r->doctoral_degree_en ?? '';

                                // ถ้า locale เป็นภาษาจีน ให้ใช้เฉพาะภาษาจีน
                                if ($locale == 'cn') {
                                    $fname = $r->fname_cn ?? '';
                                    $lname = $r->lname_cn ?? '';
                                    $position = $r->position_cn ?? '';
                                    $doctoral_degree = $r->doctoral_degree_cn ?? '';
                                } else {
                                    // ถ้า locale เป็น th หรือ en ให้แสดงไทยก่อน ลงบรรทัดใหม่ แล้วตามด้วยอังกฤษ
                                    $fullname_th = trim("$position_th $fname_th $lname_th");
                                    $fullname_en = trim("$position_en $fname_en $lname_en") . ($doctoral_degree_en ? ', ' . $doctoral_degree_en : '');
                                }
                            ?>

                            <?php if($locale == 'cn'): ?>
                                <!-- กรณีภาษาจีน -->
                                <h5 class="card-title">
                                    <?php echo e($position); ?> <?php echo e($doctoral_degree); ?> <?php echo e($fname); ?> <?php echo e($lname); ?>

                                </h5>
                            <?php else: ?>
                                <!-- กรณีภาษาไทย และอังกฤษ -->
                                <h5 class="card-title">
                                    <?php echo e($fullname_th); ?>

                                </h5>
                                <h5 class="card-title">
                                    <?php echo e($fullname_en); ?>

                                </h5>
                            <?php endif; ?>



                                

                                <?php if(app()->getLocale() == 'en'): ?>
                                <p class="card-text-1"><?php echo e(trans('message.expertise')); ?></p>
                                <div class="card-expertise">
                                    <?php $__currentLoopData = $r->expertise->sortBy('expert_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="card-text"> <?php echo e($exper->expert_name_en); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php elseif(app()->getLocale() == 'th'): ?>
                                <p class="card-text-1"><?php echo e(trans('message.expertise')); ?></p>
                                <div class="card-expertise">
                                    <?php $__currentLoopData = $r->expertise->sortBy('expert_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="card-text"> <?php echo e($exper->expert_name_th); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php elseif(app()->getLocale() == 'cn'): ?>
                                <p class="card-text-1"><?php echo e(trans('message.expertise')); ?></p>
                                <div class="card-expertise">
                                    <?php $__currentLoopData = $r->expertise->sortBy('expert_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="card-text"> <?php echo e($exper->expert_name_cn); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/researchers.blade.php ENDPATH**/ ?>