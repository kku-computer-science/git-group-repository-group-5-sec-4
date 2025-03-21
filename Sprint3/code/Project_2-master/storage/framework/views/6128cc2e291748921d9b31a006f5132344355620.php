<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }

    body label:not(.input-group-text) {
        margin-top: 10px;
    }

    body .my-select {
        background-color: #fff;
        color: #212529;
        border: #000 0.2 solid;
        border-radius: 10px;
        padding: 6px 20px;
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

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Create_other_academic_works')); ?></h4>
                <p class="card-description"><?php echo e(trans('message.Input_other_academic_works_detail')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('patents.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3"><?php echo e(trans('message.Other_academic_works_create_title')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" class="form-control" placeholder="<?php echo e(trans('message.Other_academic_works_create_title')); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_type" class="col-sm-3 "><?php echo e(trans('message.Other_academic_works_type')); ?></label>
                        <div class="col-sm-4">
                            <select id="category" class="custom-select my-select" name="ac_type">
                                <option value="" disabled selected >---- <?php echo e(trans('message.Other_academic_works_choose_type')); ?> ----</option>
                                <optgroup label="<?php echo e(trans('message.Other_academic_works_Patent')); ?>">
                                    <option value="สิทธิบัตร"><?php echo e(trans('message.Other_academic_works_Patent')); ?></option>
                                    <option value="สิทธิบัตร (การประดิษฐ์)"><?php echo e(trans('message.Other_academic_works_Patent_Invention')); ?></option>
                                    <option value="สิทธิบัตร (การออกแบบผลิตภัณฑ์)"><?php echo e(trans('message.Other_academic_works_Patent_ProductDesign')); ?></option>
                                </optgroup>
                                <optgroup label="<?php echo e(trans('message.Other_academic_works_UtilityModel')); ?>">
                                    <option value="อนุสิทธิบัตร"><?php echo e(trans('message.Other_academic_works_UtilityModel')); ?></option>
                                </optgroup>
                                <optgroup label="<?php echo e(trans('message.Other_academic_works_Copyright')); ?>">
                                    <option value="ลิขสิทธิ์"><?php echo e(trans('message.Other_academic_works_Copyright')); ?></option>
                                    <option value="ลิขสิทธิ์ (วรรณกรรม)"><?php echo e(trans('message.Other_academic_works_Copyright_LiteraryWork')); ?></option>
                                    <option value="ลิขสิทธิ์ (ตนตรีกรรม)"><?php echo e(trans('message.Other_academic_works_Copyright_Music')); ?></option>
                                    <option value="ลิขสิทธิ์ (ภาพยนตร์)"><?php echo e(trans('message.Other_academic_works_Copyright_Film')); ?></option>
                                    <option value="ลิขสิทธิ์ (ศิลปกรรม)"><?php echo e(trans('message.Other_academic_works_Copyright_Art')); ?></option>
                                    <option value="ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)"><?php echo e(trans('message.Other_academic_works_Copyright_Broadcast')); ?></option>
                                    <option value="ลิขสิทธิ์ (โสตทัศนวัสดุ)"><?php echo e(trans('message.Other_academic_works_Copyright_AudioVisualWork')); ?></option>
                                    <option value="ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)"><?php echo e(trans('message.Other_academic_works_Copyright_Other_Works')); ?></option>
                                    <option value="ลิขสิทธิ์ (สิ่งบันทึกเสียง)"><?php echo e(trans('message.Other_academic_works_Copyright_SoundRecording')); ?></option>
                                </optgroup>
                                <optgroup label="<?php echo e(trans('message.Other_academic_works_other')); ?>">
                                    <option value="ความลับทางการค้า"><?php echo e(trans('message.Other_academic_works_Trade_Secret')); ?></option>
                                    <option value="เครื่องหมายการค้า"><?php echo e(trans('message.Other_academic_works_Trade_Mark')); ?></option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 "><?php echo e(trans('message.Other_academic_works_date_copyright')); ?></label>
                        <div class="col-sm-4">
                            <input type="date" name="ac_year" class="form-control" placeholder="<?php echo e(trans('message.Other_academic_works_date_copyright')); ?>">

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_refnumber" class="col-sm-3 "><?php echo e(trans('message.Other_academic_registration_no')); ?></label>
                        <div class="col-sm-4">
                            <input type="text" name="ac_refnumber" class="form-control" placeholder="<?php echo e(trans('message.Other_academic_registration_no')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_doi" class="col-sm-3 "><?php echo e(trans('message.Other_academic_works_teacher_in_field')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="dynamicAddRemove">
                                    <tr>
                                        <td><select id='selUser0' style='width: 200px;' name="moreFields[0][userid]">
                                        <?php if(App::getLocale() == 'th'): ?>
                                                <option value=''><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                                </option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php elseif(App::getLocale() == 'en'): ?>
                                                <option value=''><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?>

                                                </option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php elseif(App::getLocale() == 'cn'): ?>
                                                <option value=''><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?>

                                                </option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td><button type="button" name="add" id="add-btn2" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />-->
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="exampleInput" class="col-sm-3 ">บุคลลภายนอก</label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                    <tr>
                                        <td><input type="text" name="fname[]" placeholder="Enter Author FName" class="form-control name_list" /></td>
                                        <td><input type="text" name="lname[]" placeholder="Enter Author LName" class="form-control name_list" /></td>
                                        <td><button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="fas fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group row ">
                        <label for="exampleInputpaper_doi" class="col-sm-3 "><?php echo e(trans('message.Other_academic_works_outsider')); ?></label>
                        <div class="col-sm-9">
                            <div class="table-responsive">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        
                                        <th><?php echo e(trans('message.First_name')); ?></th>
                                        <th><?php echo e(trans('message.Last_name')); ?></th>
                                        <!-- <th>Email Id</th> -->
                                            <!-- <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i></button> -->
                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore2" title="<?php echo e(trans('message.Add_more_person')); ?>"><i class="mdi mdi-plus"></i></span></a></th>
                                    <tr>
                                        <!--  -->
                                        <td><input type="text" name="fname[]" class="form-control" placeholder="<?php echo e(trans('message.First_name')); ?>" ></td>
                                        <td><input type="text" name="lname[]" class="form-control" placeholder="<?php echo e(trans('message.Last_name')); ?>" ></td>
                                        <!-- <td><input type="text" name="emailid[]" class="form-control"></td> -->
                                        <td><a href='javascript:void(0);' class='remove'><span><i class="mdi mdi-minus"></span></a></td>
                                    </tr>
                                </table>
                                <!-- <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" /> -->
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2"><?php echo e(trans('message.Submit_button')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('patents.index')); ?>"><?php echo e(trans('message.Cancle_button')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if(App::getLocale() == 'th'): ?>
<script>
    $(document).ready(function() {
        $("#selUser0").select2()
        $("#head0").select2()

        var i = 0;

        $("#add-btn2").click(function() {

            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</i></button></td></tr>'
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
        $("#selUser0").select2()
        $("#head0").select2()

        var i = 0;

        $("#add-btn2").click(function() {

            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</i></button></td></tr>'
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
        $("#selUser0").select2()
        $("#head0").select2()

        var i = 0;

        $("#add-btn2").click(function() {

            ++i;
            $("#dynamicAddRemove").append('<tr><td><select id="selUser' + i + '" name="moreFields[' + i +
                '][userid]"  style="width: 200px;"><option value=""><?php echo e(trans('message.Select_user_option')); ?></option><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($user->id); ?>"><?php echo e($user->fname_cn); ?> <?php echo e($user->lname_cn); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></td><td><button type="button" class="btn btn-danger btn-sm remove-tr">X</i></button></td></tr>'
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
            $('#addMore2').on('click', function() {
                var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                data.find("input").val('');
            });
            $(document).on('click', '.remove', function() {
                var trIndex = $(this).closest("tr").index();
                if (trIndex > 1) {
                    $(this).closest("tr").remove();
                } else {
                    alert("<?php echo e(trans('message.Cant_remove_first_row')); ?>");
                }
            });
        });
    </script>
<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;

        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '" class="dynamic-added"><td><input type="text" name="fname[]" placeholder="<?php echo e(trans('message.Enter_your_name')); ?>" class="form-control name_list" /></td><td><input type="text" name="lname[]" placeholder="<?php echo e(trans('message.Enter_your_name')); ?>" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/patents/create.blade.php ENDPATH**/ ?>