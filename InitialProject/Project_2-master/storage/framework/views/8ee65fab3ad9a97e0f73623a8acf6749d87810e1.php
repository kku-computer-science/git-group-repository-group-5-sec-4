<?php $__env->startSection('content'); ?>
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
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Edit_research_group')); ?></h4>
            <p class="card-description"><?php echo e(trans('message.Edit_research_group_detail')); ?></p>
            <form action="<?php echo e(route('researchGroups.update',$researchGroup->id)); ?>" method="POST" enctype="multipart/form-data" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_group_name_th')); ?></b></p>
                    <div class="col-sm-8">
                        <input name="group_name_th" value="<?php echo e($researchGroup->group_name_th); ?>" class="form-control"
                            placeholder="<?php echo e(trans('message.Research_group_name_th')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_group_name_en')); ?></b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="<?php echo e($researchGroup->group_name_en); ?>" class="form-control"
                            placeholder="<?php echo e(trans('message.Research_group_name_en')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_group_name_cn')); ?></b></p>
                    <div class="col-sm-8">
                        <input name="group_name_en" value="<?php echo e($researchGroup->group_name_cn); ?>" class="form-control"
                            placeholder="<?php echo e(trans('message.Research_group_name_cn')); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_description_th')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_th" value="<?php echo e($researchGroup->group_desc_th); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_desc_th); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_description_en')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="<?php echo e($researchGroup->group_desc_en); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_desc_en); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_description_cn')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_desc_en" value="<?php echo e($researchGroup->group_desc_cn); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_desc_cn); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_detail_th')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_th" value="<?php echo e($researchGroup->group_detail_th); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_detail_th); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_detail_en')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="<?php echo e($researchGroup->group_detail_en); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_detail_en); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_detail_cn')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="group_detail_en" value="<?php echo e($researchGroup->group_detail_cn); ?>" class="form-control"
                            style="height:90px"><?php echo e($researchGroup->group_detail_cn); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_image')); ?></b></p>
                    <div class="col-sm-8">
                        <input type="file" name="group_image" class="form-control" >
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3"><b><?php echo e(trans('message.Research_group_head')); ?></b></p>
                    <div class="col-sm-8">
                        <select id='head0' name="head">
                            <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($u->pivot->role == 1): ?>
                                <?php if(App::getLocale() == 'th'): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                        <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif(App::getLocale() == 'en'): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                        <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif(App::getLocale() == 'cn'): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                        <?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 pt-4"><b><?php echo e(trans('message.Research_group_member')); ?></b></p>
                    <div class="col-sm-8">
                        <table class="table" id="dynamicAddRemove">
                            <tr>
                                <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i
                                            class="mdi mdi-plus"></i></button></th>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mt-5"><?php echo e(trans('message.Submit_button')); ?></button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('researchGroups.index')); ?>"> <?php echo e(trans('message.Cancle_button')); ?></a>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>

<?php if(App::getLocale() == 'th'): ?>
<script>
$(document).ready(function() {
    $("#head0").select2()
    $("#fund").select2()


    var researchGroup = <?php echo $researchGroup['user']; ?>;
    var i = 0;

    for (i = 0; i < researchGroup.length; i++) {
        var obj = researchGroup[i];

        if (obj.pivot.role === 2) {
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>" ><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );
            document.getElementById("selUser" + i).value = obj.id;
            $("#selUser" + i).select2()

        }
        //document.getElementById("#dynamicAddRemove").value = "10";
    }
    $("#add-btn2").click(function() {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
        );
        $("#selUser" + i).select2()

    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
<?php elseif(App::getLocale() == 'en'): ?>
<script>
$(document).ready(function() {
    $("#head0").select2()
    $("#fund").select2()


    var researchGroup = <?php echo $researchGroup['user']; ?>;
    var i = 0;

    for (i = 0; i < researchGroup.length; i++) {
        var obj = researchGroup[i];

        if (obj.pivot.role === 2) {
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>" ><?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );
            document.getElementById("selUser" + i).value = obj.id;
            $("#selUser" + i).select2()

        }
        //document.getElementById("#dynamicAddRemove").value = "10";
    }
    $("#add-btn2").click(function() {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
        );
        $("#selUser" + i).select2()

    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
<?php elseif(App::getLocale() == 'cn'): ?>
<script>
$(document).ready(function() {
    $("#head0").select2()
    $("#fund").select2()


    var researchGroup = <?php echo $researchGroup['user']; ?>;
    var i = 0;

    for (i = 0; i < researchGroup.length; i++) {
        var obj = researchGroup[i];

        if (obj.pivot.role === 2) {
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>" ><?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );
            document.getElementById("selUser" + i).value = obj.id;
            $("#selUser" + i).select2()

        }
        //document.getElementById("#dynamicAddRemove").value = "10";
    }
    $("#add-btn2").click(function() {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
            '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
        );
        $("#selUser" + i).select2()

    });
    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });

});
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_groups/edit.blade.php ENDPATH**/ ?>