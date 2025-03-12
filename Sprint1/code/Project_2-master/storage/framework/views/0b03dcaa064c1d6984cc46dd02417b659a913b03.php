<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('message.Other_academic_works_header')); ?></h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('patents.create')); ?>"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(trans('message.Add_other_academic_works')); ?> </a>
                <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('message.Other_academic_works_no')); ?></th>
                            <th><?php echo e(trans('message.Other_academic_works_title')); ?></th>
                            <th><?php echo e(trans('message.Other_academic_works_type')); ?></th>
                            <th><?php echo e(trans('message.Other_academic_registration_date')); ?></th>
                            <th><?php echo e(trans('message.Other_academic_registration_no')); ?></th>
                            <th><?php echo e(trans('message.Other_academic_works_author')); ?></th>
                            <th width="280px"><?php echo e(trans('message.Other_academic_works_action')); ?></th>
                        </tr>
                        <thead>
                        <tbody>
                            <?php $__currentLoopData = $patents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i + 1); ?></td>
                                    <td><?php echo e(Str::limit($paper->ac_name, 50)); ?></td>
                                    <td>
                                        <?php if(App::getLocale() == 'th'): ?>
                                            <?php if($paper->ac_type == 'สิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_Invention')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_ProductDesign')); ?>

                                            <?php elseif($paper->ac_type == 'อนุสิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_UtilityModel')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_LiteraryWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Music')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Film')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Art')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Broadcast')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_AudioVisualWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Other_Works')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_SoundRecording')); ?>

                                            <?php elseif($paper->ac_type == 'ความลับทางการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Secret')); ?>

                                            <?php elseif($paper->ac_type == 'เครื่องหมายการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Mark')); ?>

                                            <?php endif; ?>
                                        <?php elseif(App::getLocale() == 'en'): ?>
                                            <?php if($paper->ac_type == 'สิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_Invention')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_ProductDesign')); ?>

                                            <?php elseif($paper->ac_type == 'อนุสิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_UtilityModel')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_LiteraryWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Music')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Film')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Art')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Broadcast')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_AudioVisualWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Other_Works')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_SoundRecording')); ?>

                                            <?php elseif($paper->ac_type == 'ความลับทางการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Secret')); ?>

                                            <?php elseif($paper->ac_type == 'เครื่องหมายการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Mark')); ?>

                                            <?php endif; ?>
                                        <?php elseif(App::getLocale() == 'cn'): ?>
                                            <?php if($paper->ac_type == 'สิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การประดิษฐ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_Invention')); ?>

                                            <?php elseif($paper->ac_type == 'สิทธิบัตร (การออกแบบผลิตภัณฑ์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Patent_ProductDesign')); ?>

                                            <?php elseif($paper->ac_type == 'อนุสิทธิบัตร'): ?>
                                                <?php echo e(trans('message.Other_academic_works_UtilityModel')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (วรรณกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_LiteraryWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ตนตรีกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Music')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ภาพยนตร์)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Film')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (ศิลปกรรม)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Art')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานแพร่เสี่ยงแพร่ภาพ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Broadcast')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (โสตทัศนวัสดุ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_AudioVisualWork')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (งานอื่นใดในแผนกวรรณคดี/วิทยาศาสตร์/ศิลปะ)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_Other_Works')); ?>

                                            <?php elseif($paper->ac_type == 'ลิขสิทธิ์ (สิ่งบันทึกเสียง)'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Copyright_SoundRecording')); ?>

                                            <?php elseif($paper->ac_type == 'ความลับทางการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Secret')); ?>

                                            <?php elseif($paper->ac_type == 'เครื่องหมายการค้า'): ?>
                                                <?php echo e(trans('message.Other_academic_works_Trade_Mark')); ?>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($paper->ac_year); ?></td>
                                    <td><?php echo e($paper->ac_refnumber, 50); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $paper->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(App::getLocale() == 'th'): ?>
            <?php echo e($a->fname_th); ?> <?php echo e($a->lname_th); ?>

        <?php elseif(App::getLocale() == 'en'): ?>
            <?php echo e($a->fname_en); ?> <?php echo e($a->lname_en); ?>

        <?php elseif(App::getLocale() == 'cn'): ?>
            <?php echo e($a->fname_cn); ?> <?php echo e($a->lname_cn); ?>

        <?php endif; ?>
        <?php if(!$loop->last): ?>
            ,
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td>
                                        <form action="<?php echo e(route('patents.destroy', $paper->id)); ?>" method="POST">

                                            <!-- <a class="btn btn-info" href="<?php echo e(route('patents.show', $paper->id)); ?>">Show</a> -->
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="<?php echo e(route('patents.show', $paper->id)); ?>"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            <!-- <a class="btn btn-primary" href="<?php echo e(route('patents.edit', $paper->id)); ?>">Edit</a> -->
                                            <?php if(Auth::user()->can('update', $paper)): ?>
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="<?php echo e(route('patents.edit', $paper->id)); ?>"><i
                                                            class="mdi mdi-pencil"></i></a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->can('delete', $paper)): ?>
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <li class="list-inline-item">
                                                    <button class="btn btn-outline-danger btn-sm show_confirm"
                                                        type="submit" data-toggle="tooltip" data-placement="top"
                                                        title="Delete"><i class="mdi mdi-delete"></i></button>
                                                </li>
                                            <?php endif; ?>
                                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tbody>
                </table>
                <!-- </div> -->
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
    <script>
        $(document).ready(function() {
            var table1 = $('#example1').DataTable({
                responsive: true,
                language: {
                    "emptyTable": "<?php echo e(trans('message.No_data_avalible')); ?>",
                    "info": "<?php echo e(trans('message.info')); ?>",
                    "infoEmpty": "<?php echo e(trans('message.infoEmpty')); ?>",
                    "infoFiltered": "<?php echo e(trans('message.infoFiltered')); ?>",
                    "lengthMenu": "<?php echo e(trans('message.lengthMenu')); ?>",
                    "search": "<?php echo e(trans('message.search')); ?>",
                    "paginate": {
                        "next": "<?php echo e(trans('message.Next')); ?>",
                        "previous": "<?php echo e(trans('message.Previous')); ?>"
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `<?php echo e(trans('message.Fund_warning_delete.warning_title')); ?>`,
                    text: "<?php echo e(trans('message.Fund_warning_delete.warning_text')); ?>",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("<?php echo e(trans('message.Delete_successfully')); ?>", {
                            icon: "success",
                        }).then(function() {
                            location.reload();
                            form.submit();
                        });
                    }
                });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/patents/index.blade.php ENDPATH**/ ?>