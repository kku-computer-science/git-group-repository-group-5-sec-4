<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('content'); ?>
<!-- <div class="row">
    <div class="col-lg-12" style="text-align: center">
        <div>
            <h2>ความเชี่ยวชาญ</h2>
        </div>
        <br />
    </div>
</div> -->
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-expertise" data-toggle="modal">Add
                Expertise</a>
        </div>
    </div>
</div> -->
<!-- <br />
<?php if($message = Session::get('success')): ?>
<div class="alert alert-success">
    <p id="msg"><?php echo e($message); ?></p>
</div>
<?php endif; ?> -->
<div class="container">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;"><?php echo e(trans('message.Manage_Expertise_navbar_title')); ?> </h4>
            <table id="example1" class="table table-striped">
                <thead>
                    <tr>
                        <th><?php echo e(trans('message.Expertise_no')); ?> </th>
                        <?php if(Auth::user()->hasRole('admin')): ?>
                        <th><?php echo e(trans('message.Expertise_teacher_name')); ?></th>
                        <?php endif; ?>
                        <th><?php echo e(trans('message.Expertise_name')); ?></th>

                        <th><?php echo e(trans('message.Expertise_action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $experts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $expert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="expert_id_<?php echo e($expert->id); ?>">
                        <td><?php echo e($i+1); ?></td>
                        <?php if(Auth::user()->hasRole('admin')): ?>
                        <td>
                            <?php echo e($expert->user->{'fname_' . app()->getLocale()} ?? $expert->user->fname_en); ?> 
                            <?php echo e($expert->user->{'lname_' . app()->getLocale()} ?? $expert->user->lname_en); ?>

                        </td>
                        <?php endif; ?>

                        <!-- แสดงชื่อความเชี่ยวชาญตามภาษา -->
                        <td>
                            <p><?php echo e($expert->{'expert_name_' . app()->getLocale()} ?? $expert->expert_name_en); ?></p>
                        </td>


                        <td>
                            <form action="<?php echo e(route('experts.destroy',$expert->id)); ?>" method="POST">
                                <!-- <a class="btn btn-info" id="show-expertise" data-toggle="modal" data-id="<?php echo e($expert->id); ?>">Show</a> -->
                                <li class="list-inline-item">
                                    <!-- <a class="btn btn-success btn-sm rounded-0" href="javascript:void(0)" id="edit-expertise" type="button" data-toggle="modal" data-placement="top" data-id="<?php echo e($expert->id); ?>" title="Edit"><i class="fa fa-edit"></i></a> -->
                                    <a class="btn btn-outline-success btn-sm" id="edit-expertise" type="button" data-toggle="modal" data-id="<?php echo e($expert->id); ?>" data-placement="top" title="Edit" href="javascript:void(0)"><i class="mdi mdi-pencil"></i></a>

                                </li>

                                <!-- <a href="javascript:void(0)" class="btn btn-success" id="edit-expertise" data-toggle="modal" data-id="<?php echo e($expert->id); ?>">Edit </a> -->
                                <?php echo csrf_field(); ?>
                                <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
                                <li class="list-inline-item">
                                    <button class="btn btn-outline-danger btn-sm show_confirm" id="delete-expertise" type="submit" data-id="<?php echo e($expert->id); ?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>

                                </li>
                                <!-- <a id="delete-expertise" data-id="<?php echo e($expert->id); ?>" class="btn btn-danger delete-user">Delete</a> -->

                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Add and Edit expertise modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="expertiseCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="expForm" action="<?php echo e(route('experts.store')); ?>" method="POST">
                    <input type="hidden" name="exp_id" id="exp_id">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <?php
                            $locale = app()->getLocale();
                            $labels = [
                                'en' => ['Name in Thai', 'Name in English', 'Name in Chinese'],
                                'th' => ['ชื่อภาษาไทย', 'ชื่อภาษาอังกฤษ', 'ชื่อภาษาจีน'],
                                'cn' => ['泰文名', '英文名', '中文名称']
                            ];
                        ?>

                        <div class="form-group">
                            <strong><?php echo e($labels[$locale][0]); ?> :</strong>
                            <input type="text" name="expert_name_th" id="expert_name_th" class="form-control" placeholder="<?php echo e($labels[$locale][0]); ?>" onchange="validate()">

                            <strong><?php echo e($labels[$locale][1]); ?> :</strong>
                            <input type="text" name="expert_name_en" id="expert_name_en" class="form-control" placeholder="<?php echo e($labels[$locale][1]); ?>" onchange="validate()">

                            <strong><?php echo e($labels[$locale][2]); ?> :</strong>
                            <input type="text" name="expert_name_cn" id="expert_name_cn" class="form-control" placeholder="<?php echo e($labels[$locale][2]); ?>" onchange="validate()">
                        </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary " disabled><?php echo e(trans('message.Submit_button')); ?></button>
                            <a href="<?php echo e(route('experts.index')); ?>" class="btn btn-danger"><?php echo e(trans('message.Cancle_button')); ?></a>
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
<script src="https://cdn.datatables.net/rowgroup/1.2.0/js/dataTables.rowGroup.min.js" defer></script>
<script>
    $(document).ready(function() {
        var table1 = $('#example1').DataTable({

            order: [
                [1, 'asc']
            ],
            rowGroup: {
                dataSrc: 1
            },
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /* When click New expertise button */
        $('#new-expertise').click(function() {
            $('#btn-save').val("create-expertise");
            $('#expertise').trigger("reset");
            $('#expertiseCrudModal').html("<?php echo e(trans('message.Add_new_expertise')); ?>");
            $('#crud-modal').modal('show');
        });

        /* Edit expertise */
        $('body').on('click', '#edit-expertise', function() {
            var expert_id = $(this).data('id');
            $.get('experts/' + expert_id + '/edit', function(data) {
                $('#expertiseCrudModal').html("<?php echo e(trans('message.Edit_expertise')); ?>");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled', false);
                $('#crud-modal').modal('show');
                $('#exp_id').val(data.id);
                $('#expert_name').val(data.expert_name);
                $('#expert_name_th').val(data.expert_name_th);
                $('#expert_name_cn').val(data.expert_name_cn);

            })
        });


        /* Delete expertise */
        $('body').on('click', '#delete-expertise', function(e) {
            var expert_id = $(this).data("id");
            
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
                            url: "experts/" + expert_id,
                            data: {
                                "id": expert_id,
                                "_token": token,
                            },
                            success: function(data) {
                                $('#msg').html('<?php echo e(trans('message.Program_entry_deleted')); ?>');
                                $("#expert_id_" + expert_id).remove();
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
        if (document.expForm.expert_name.value != '')
            document.expForm.btnsave.disabled = false
        else
            document.expForm.btnsave.disabled = true
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/expertise/index.blade.php ENDPATH**/ ?>