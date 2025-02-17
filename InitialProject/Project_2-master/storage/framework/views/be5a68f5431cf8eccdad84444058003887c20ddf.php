

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
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                <h4 class="card-title">เพิ่มทุนวิจัย</h4>
                <p class="card-description">กรอกข้อมูลรายละเอียดทุนงานวิจัย</p>
                <form class="forms-sample" action="<?php echo e(route('funds.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputfund_type" class="col-sm-2 ">ประเภททุนวิจัย</label>
                        <div class="col-sm-4">
                            <select name="fund_type" class="custom-select my-select" id="fund_type" onchange='toggleDropdown(this);' required>
                                <option value="" disabled selected >---- โปรดระบุประเภททุน ----</option>
                                <option value="ทุนภายใน">ทุนภายใน</option>
                                <option value="ทุนภายนอก">ทุนภายนอก</option>
                            </select>
                        </div>
                    </div>
                    <div id="fund_code">
                        <div class="form-group row">
                            <label for="exampleInputfund_level" class="col-sm-2 ">ระดับทุน</label>
                            <div class="col-sm-4">
                                <select name="fund_level" class="custom-select my-select">
                                <option value="" disabled selected >---- โปรดระบุระดับทุน ----</option>
                                    <option value="">ไม่ระบุ</option>
                                    <option value="สูง">สูง</option>
                                    <option value="กลาง">กลาง</option>
                                    <option value="ล่าง">ล่าง</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputfund_name" class="col-sm-2 ">ชื่อทุน</label>
                        <div class="col-sm-8">
                            <input type="text" name="fund_name" class="form-control" placeholder="name">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="exampleInputsupport_resource" class="col-sm-2 ">หน่วยงานที่สนับสนุน / โครงการวิจัย </label>
                        <div class="col-sm-8">
                            <input type="text" name="support_resource" class="form-control" placeholder="Support Resource">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="<?php echo e(route('funds.index')); ?>">Cancel</a>
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