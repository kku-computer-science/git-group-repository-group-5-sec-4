<?php $__env->startSection('content'); ?>
<style>
    .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 5px;
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
    <div class="card col-md-12" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Edit_research_project')); ?></h4>
            <p class="card-description"><?php echo e(trans('message.Edit_research_project_detail')); ?></p>
            <form action="<?php echo e(route('researchProjects.update',$researchProject->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_name')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="project_name" value="<?php echo e($researchProject->project_name); ?>" class="form-control" style="height:90px"><?php echo e($researchProject->project_name); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_start')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="date" name="project_start" value="<?php echo e($researchProject->project_start); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_end')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="date" name="project_end" value="<?php echo e($researchProject->project_end); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p for="exampleInputfund_details" class="col-sm-3"><b><?php echo e(trans('message.Please_choose_fund')); ?></b></p>
                    <div class="col-sm-9">
                        <select id='fund' style='width: 200px;' class="custom-select my-select" name="fund">
                            <option value='' disabled selected><?php echo e(trans('message.Please_choose_fund')); ?></option><?php $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($f->id); ?>" <?php echo e($f->fund_name == $researchProject->fund->fund_name ? 'selected' : ''); ?>><?php echo e($f->fund_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Year_submission')); ?></b></p>
                    <div class="col-sm-8">
                        <input type="year" name="project_year" class="form-control" placeholder="<?php echo e(trans('message.Year_submission')); ?>" value="<?php echo e($researchProject->project_year); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_budget')); ?></b></p>
                    <div class="col-sm-4">
                        <input type="number" name="budget" value="<?php echo e($researchProject->budget); ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Responsible_department')); ?></b></p>
                    <div class="col-sm-3">
                        <select id='dep' style='width: 200px;' class="custom-select my-select"  name="responsible_department">
                            <option value=''><?php echo e(trans('message.Select_department_option')); ?></option><?php $__currentLoopData = $deps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($dep->department_name_th); ?>" <?php echo e($dep->department_name_th == $researchProject->responsible_department ? 'selected' : ''); ?>><?php echo e(trans('message.Department_name')); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_description')); ?></b></p>
                    <div class="col-sm-8">
                        <textarea name="note" class="form-control" style="height:90px"><?php echo e($researchProject->note); ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <p class="col-sm-3 "><b><?php echo e(trans('message.Research_project_status.Title')); ?></b></p>
                    <div class="col-sm-8">
                        <select id='status' class="custom-select my-select" style='width: 200px;' name="status">
                            <option value="1" <?php echo e(1 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(trans('message.Research_project_status.Request')); ?></option>
                            <option value="2" <?php echo e(2 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(trans('message.Research_project_status.Progress')); ?></option>
                            <option value="3" <?php echo e(3 == $researchProject->status ? 'selected' : ''); ?>><?php echo e(trans('message.Research_project_status.Close')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <table class="table">
                        <tr>
                            <th><?php echo e(trans('message.Research_project_responsible')); ?></th>
                        <tr>
                            <td>
                                <select id='head0' style='width: 200px;' name="head">
                                    <?php $__currentLoopData = $researchProject->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($u->pivot->role == 1): ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(App::getLocale() == 'th'): ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                            <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                        </option>
                                    <?php elseif(App::getLocale() == 'en'): ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                            <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?>

                                        </option>
                                    <?php elseif(App::getLocale() == 'cn'): ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($u->id == $user->id): ?> selected <?php endif; ?>>
                                            <?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?>

                                        </option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <table class="table " id="dynamicAddRemove">
                        <tr>
                            <th width="522.98px"><?php echo e(trans('message.Internal_co-project_manager')); ?></th>
                            <th><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm add"><i class="mdi mdi-plus"></i></button></th>
                        </tr>
                    </table>
                </div>
                <div class="form-group row">
                        <label for="exampleInputpaper_author" class="col-sm-3 col-form-label"><?php echo e(trans('message.External_co-project_manager')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered w-75" id="dynamic_field">

                                    <tr>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button>
                                        </td>
                                    </tr>

                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                        </div>
                <button type="submit" class="btn btn-primary mt-5"><?php echo e(trans('message.Submit_button')); ?></button>
                <a class="btn btn-light mt-5" href="<?php echo e(route('researchProjects.index')); ?>"> <?php echo e(trans('message.Cancle_button')); ?></a>
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
        //$("#fund").select2()

        //$("#dep").select2()
        var researchProject = <?php echo $researchProject['user']; ?>;
        var i = 0;

        for (i = 0; i < researchProject.length; i++) {
            var obj = researchProject[i];

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
        //$("#fund").select2()

        //$("#dep").select2()
        var researchProject = <?php echo $researchProject['user']; ?>;
        var i = 0;

        for (i = 0; i < researchProject.length; i++) {
            var obj = researchProject[i];

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
        //$("#fund").select2()

        //$("#dep").select2()
        var researchProject = <?php echo $researchProject['user']; ?>;
        var i = 0;

        for (i = 0; i < researchProject.length; i++) {
            var obj = researchProject[i];

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
                '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr"><i class="mdi mdi-minus"></i></button></td></tr>'
            );
            $("#selUser" + i).select2()
        });


        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });

    });
</script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        var outsider = <?php echo $researchProject->outsider; ?>;

        var postURL = "<?php echo url('addmore'); ?>";
        var i = 0;
        //console.log(patent)

        for (i = 0; i < outsider.length; i++) {value="'+ obj.title_name +'"
            //console.log(patent);
            var obj = outsider[i];
            $("#dynamic_field").append('<tr id="row' + i +
                '" class="dynamic-added"><td><p><?php echo e(trans('message.Postion_or_prefix')); ?> :</p><input type="text" name="title_name[]" value="'+ obj.title_name +'" placeholder="<?php echo e(trans('message.Postion_or_prefix')); ?>" style="width: 200px;" class="form-control name_list" /><br><p><?php echo e(trans('message.First_name')); ?> :</p><input type="text" name="fname[]" value="'+ obj.fname +'" placeholder="<?php echo e(trans('message.First_name')); ?>" style="width: 300px;" class="form-control name_list" /><br><p><?php echo e(trans('message.Last_name')); ?> :</p><input type="text" name="lname[]" value="'+ obj.lname +'" placeholder="<?php echo e(trans('message.Last_name')); ?>" style="width: 300px;" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove"><i class="mdi mdi-minus"></i></button></td></tr>');
            //document.getElementById("selUser" + i).value = obj.id;
            //console.log(obj.author_fname)
            // let doc=document.getElementById("row" + i)
            // doc.setAttribute('fname','aaa');
            // doc.setAttribute('lname','bbb');
            //document.getElementById("row" + i).value = obj.author_lname;
            //document.getAttribute("lname").value = obj.author_lname;
            //$("#selUser" + i).select2()


            //document.getElementById("#dynamicAddRemove").value = "10";
        }

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><p><?php echo e(trans('message.Postion_or_prefix')); ?> :</p><input type="text" name="title_name[]" placeholder="<?php echo e(trans('message.Postion_or_prefix')); ?>" style="width: 200px;" class="form-control name_list" /><br><p><?php echo e(trans('message.First_name')); ?> :</p><input type="text" name="fname[]" placeholder="<?php echo e(trans('message.First_name')); ?>" style="width: 300px;" class="form-control name_list" /><br><p><?php echo e(trans('message.Last_name')); ?> :</p><input type="text" name="lname[]" placeholder="<?php echo e(trans('message.Last_name')); ?>" style="width: 300px;" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove"><i class="mdi mdi-minus"></i></button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_projects/edit.blade.php ENDPATH**/ ?>