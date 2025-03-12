<?php $__env->startPush('styles'); ?>
    <!-- ✅ โหลด CSS ตามลำดับ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    

        <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success"><?php echo e($message); ?></div>
        <?php endif; ?>

        <div class="card p-3">
            <div class="card-body">
                <h4 class="card-title text-center"><?php echo e(trans('message.Manage_Program_navbar_title')); ?></h4>
                <a class="btn btn-primary btn-sm mb-3" href="javascript:void(0)" id="new-program" data-toggle="modal">
                    <i class="mdi mdi-plus"></i> <?php echo e(trans('message.Add_program')); ?>

                </a>
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('message.Program_no')); ?></th>
                            <th><?php echo e(trans('message.Program_name')); ?></th>
                            <th><?php echo e(trans('message.Program_degree')); ?></th>
                            <th><?php echo e(trans('message.Program_action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="program_id_<?php echo e($program->id); ?>">
                                <td><?php echo e($i + 1); ?></td>
                                <td><?php echo e($program->{'program_name_' . App::getLocale()}); ?></td>
                                <td><?php echo e($program->degree->{'degree_name_' . App::getLocale()}); ?></td>
                                <td>
                                    <form action="<?php echo e(route('programs.destroy', $program->id)); ?>" method="POST">
                                        <li class="list-inline-item">
                                            <a class="btn btn-outline-success btn-sm" id="edit-program" 
                                                data-toggle="modal" data-id="<?php echo e($program->id); ?>" title="Edit">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>
                                        </li>
                                        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                        <li class="list-inline-item">
                                            <button class="btn btn-outline-danger btn-sm" id="delete-program" type="submit"
                                                data-id="<?php echo e($program->id); ?>" title="Delete">
                                                <i class="mdi mdi-delete"></i>
                                            </button>
                                        </li>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ✅ Modal Form สำหรับเพิ่มและแก้ไขโปรแกรม -->
    <div class="modal fade" id="crud-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="programCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form name="proForm" action="<?php echo e(route('programs.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="pro_id" id="pro_id">
                        <div class="form-group">
                            <strong><?php echo e(trans('message.Program_degree')); ?>:</strong>
                            <select id="degree" class="custom-select" name="degree">
                                <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($d->id); ?>"><?php echo e($d->{'degree_name_' . App::getLocale()}); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong><?php echo e(trans('message.Program_name_th')); ?>:</strong>
                            <input type="text" name="program_name_th" id="program_name_th" class="form-control" 
                                placeholder="<?php echo e(trans('message.Program_name_th')); ?>" onchange="validate()">
                        </div>
                        <div class="form-group">
                            <strong><?php echo e(trans('message.Program_name_en')); ?>:</strong>
                            <input type="text" name="program_name_en" id="program_name_en" class="form-control"
                                placeholder="<?php echo e(trans('message.Program_name_en')); ?>" onchange="validate()">
                        </div>
                        <div class="form-group">
                            <strong><?php echo e(trans('message.Program_name_cn')); ?>:</strong>
                            <input type="text" name="program_name_cn" id="program_name_cn" class="form-control"
                                placeholder="<?php echo e(trans('message.Program_name_cn')); ?>" onchange="validate()">
                        </div>
                        <div class="text-center">
                            <button type="submit" id="btn-save" class="btn btn-primary" disabled>
                                <?php echo e(trans('message.Submit_button')); ?>

                            </button>
                            <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-danger">
                                <?php echo e(trans('message.Cancle_button')); ?>

                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add and Edit program modal -->
    <div class="modal fade" id="crud-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="programCrudModal"></h4>
                </div>
                <div class="modal-body">
                    <form name="proForm" action="<?php echo e(route('programs.store')); ?>" method="POST">
                        <input type="hidden" name="pro_id" id="pro_id">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong><?php echo e(trans('message.Program_degree')); ?>:</strong>
                                    <div class="col-sm-8">
                                        <select id="degree" class="custom-select my-select" name="degree">
                                            <?php $__currentLoopData = $degree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($d->id); ?>"><?php echo e($d->degree_name_th); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong><?php echo e(trans('message.Program_name')); ?>:</strong>
                                    <div class="col-sm-8">
                                        <select id="department" class="custom-select my-select" name="department">
                                            <?php $__currentLoopData = $department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($d->id); ?>"><?php echo e($d->department_name_th); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <strong><?php echo e(trans('message.Program_name_th')); ?>:</strong>
                                    <input type="text" name="program_name_th" id="program_name_th" class="form-control"
                                        placeholder="<?php echo e(trans('message.Program_name_th')); ?>" onchange="validate()">
                                </div>
                                <div class="form-group">
                                    <strong><?php echo e(trans('message.Program_name_en')); ?>:</strong>
                                    <input type="text" name="program_name_en" id="program_name_en"
                                        class="form-control" placeholder="<?php echo e(trans('message.Program_name_en')); ?>" onchange="validate()">
                                </div>
                                <div class="form-group">
                                    <strong><?php echo e(trans('message.Program_name_cn')); ?>:</strong>
                                    <input type="text" name="program_name_cn" id="program_name_cn"
                                        class="form-control" placeholder="<?php echo e(trans('message.Program_name_cn')); ?>" onchange="validate()">
                                </div>
                                <!-- <div class="form-group">
                                    <strong>ระดับการศึกษา:</strong>
                                    <input type="text" name="degree_id" id="degree_id" class="form-control" placeholder="degree_id" onchange="validate()">
                                </div> -->

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                    disabled><?php echo e(trans('message.Submit_button')); ?></button>
                                <a href="<?php echo e(route('programs.index')); ?>" class="btn btn-danger"><?php echo e(trans('message.Cancle_button')); ?></a>
                                <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </form>
                </div>
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
    <script>
        $(document).ready(function() {

            /* When click New program button */
            $('#new-program').click(function() {
                $('#btn-save').val("create-program");
                $('#program').trigger("reset");
                $('#programCrudModal').html("<?php echo e(trans('message.Add_new_program')); ?>");
                $('#crud-modal').modal('show');
            });

            $('body').on('click', '#edit-program', function() {
                var program_id = $(this).data('id');
                $.get('programs/' + program_id + '/edit', function(data) {
                    $('#programCrudModal').html("<?php echo e(trans('message.Edit_program')); ?>");
                    $('#btn-update').val("Update");
                    $('#btn-save').prop('disabled', false);
                    $('#crud-modal').modal('show');
                    $('#pro_id').val(data.id);
                    $('#program_name_th').val(data.program_name_th);
                    $('#program_name_en').val(data.program_name_en);
                    //$('#degree').val(data.program_name_en);
                    $('#degree').val(data.degree_id);
                })
            });


            /* Delete program */
            $('body').on('click', '#delete-program', function(e) {
                var program_id = $(this).data("id");

                var token = $("meta[name='csrf-token']").attr("content");
                e.preventDefault();
                //confirm("Are You sure want to delete !");
                swal({
                    title: `<?php echo e(trans('message.Fund_warning_delete.warning_title')); ?>`,
                    text: "<?php echo e(trans('message.Fund_warning_delete.warning_text')); ?>",
                    type: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("<?php echo e(trans('message.Delete_successfully')); ?>", {
                            icon: "success",
                        }).then(function() {
                            location.reload();
                            $.ajax({
                                type: "DELETE",
                                url: "programs/" + program_id,
                                data: {
                                    "id": program_id,
                                    "_token": token,
                                },
                                success: function(data) {
                                    $('#msg').html(
                                        '<?php echo e(trans('message.Program_entry_deleted')); ?>'
                                        );
                                    $("#program_id_" + program_id).remove();
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        });

                    }
                });
            });
        });
    </script>
    <script>
        error = false

        function validate() {
            if (document.proForm.program_name_th.value != '' && document.proForm.program_name_en.value != '')
                document.proForm.btnsave.disabled = false
            else
                document.proForm.btnsave.disabled = true
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/programs/index.blade.php ENDPATH**/ ?>