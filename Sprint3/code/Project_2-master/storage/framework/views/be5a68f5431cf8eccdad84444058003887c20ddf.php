<?php $__env->startSection('content'); ?>
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 4px 10px;
        width: 100%;
        font-size: 14px;
    }
</style>
<div class="container">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(trans('message.error_input.Whoops')); ?></strong> <?php echo e(trans('message.error_input.Error_problem')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <!-- <a class="btn btn-primary" href="<?php echo e(route('funds.index')); ?>"> Back </a> -->
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Add_research_fund')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.Input_research_fund_detail')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('funds.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputfund_type" class="col-sm-2 "><?php echo e(trans('message.Fund_type')); ?></label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected >---- <?php echo e(trans('message.Please_choose_fund_type')); ?> ----</option>
                                <option value="ทุนภายใน"><?php echo e(trans('message.internal_fund')); ?></option>
                                <option value="ทุนภายนอก"><?php echo e(trans('message.external_fund')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="exampleInputfund_level" class="col-sm-2 "><?php echo e(trans('message.Fund_level')); ?></label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                <option value="" disabled selected >---- <?php echo e(trans('message.Please_choose_fund_level')); ?> ----</option>
                                    <option value=""><?php echo e(trans('message.Fund_level_not_define')); ?></option>
                                    <option value="สูง"><?php echo e(trans('message.Fund_level_low')); ?></option>
                                    <option value="กลาง"><?php echo e(trans('message.Fund_level_medium')); ?></option>
                                    <option value="ล่าง"><?php echo e(trans('message.Fund_level_high')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 "><?php echo e(trans('message.Fund_name')); ?></label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="<?php echo e(trans('message.Fund_name')); ?>">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 "><?php echo e(trans('message.Organization_support')); ?> </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="<?php echo e(trans('message.Organization_support')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 "><?php echo e(trans('message.Organization_support_en')); ?> </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource_en" class="form-control" placeholder="<?php echo e(trans('message.Organization_support_en')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 "><?php echo e(trans('message.Organization_support_cn')); ?> </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource_cn" class="form-control" placeholder="<?php echo e(trans('message.Organization_support_cn')); ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(trans('message.Submit_button')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('funds.index')); ?>"><?php echo e(trans('message.Cancle_button')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const ac = document.getElementById("fund_code");
    //ac.style.display = "none";

    function toggleDropdown(selObj) {
        ac.style.display = selObj.value === "ทุนภายใน" ? "block" : "none";
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/funds/create.blade.php ENDPATH**/ ?>