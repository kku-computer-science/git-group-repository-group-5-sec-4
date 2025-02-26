<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<?php $__env->startSection('content'); ?>

<div class="container">
    <?php if($message = Session::get('success')): ?>
    <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
    </div>
    <?php endif; ?>
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title"><?php echo e(trans('message.Research_Group_navbar_title')); ?></h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('researchGroups.create')); ?>"><i
                    class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(trans('message.Add_research_group')); ?></a>
            <!-- <div class="table-responsive"> -->
                <table id ="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('message.Research_group_no')); ?></th>
                            <th><?php echo e(trans('message.Research_group_name')); ?></th>
                            <th><?php echo e(trans('message.Research_group_head')); ?></th>
                            <th><?php echo e(trans('message.Research_group_member')); ?></th>
                            <th width="280px"><?php echo e(trans('message.Research_group_action')); ?></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $__currentLoopData = $researchGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$researchGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i+1); ?></td>
                            <!--<td><?php echo e(Str::limit($researchGroup->group_name_th,50)); ?></td> -->
                            <td>
                            <?php if(App::getLocale() == 'en'): ?>
                            <?php echo e(Str::limit($researchGroup->group_name_en,50)); ?>

                            <?php elseif(App::getLocale() == 'th'): ?>
                            <?php echo e(Str::limit($researchGroup->group_name_th,50)); ?>

                            <?php elseif(App::getLocale() == 'cn'): ?>
                            <?php echo e(Str::limit($researchGroup->group_name_cn,50)); ?>                                       
                            <?php endif; ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $user->pivot->role == 1): ?>
                                    <?php if(App::getLocale() == 'en'): ?>
                                        <?php echo e($user->fname_en); ?>

                                    <?php elseif(App::getLocale() == 'th'): ?>
                                        <?php echo e($user->fname_th); ?>

                                    <?php elseif(App::getLocale() == 'cn'): ?>
                                        <?php echo e($user->fname_cn); ?>

                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php $__currentLoopData = $researchGroup->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $user->pivot->role == 2): ?>
                                    <?php if(App::getLocale() == 'en'): ?>
                                        <?php echo e($user->fname_en); ?>

                                    <?php elseif(App::getLocale() == 'th'): ?>
                                        <?php echo e($user->fname_th); ?>

                                    <?php elseif(App::getLocale() == 'cn'): ?>
                                        <?php echo e($user->fname_cn); ?>

                                    <?php endif; ?>
                                <?php if(!$loop->last): ?>,<?php endif; ?>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <form action="<?php echo e(route('researchGroups.destroy',$researchGroup->id)); ?>" method="POST">

                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="view"
                                        href="<?php echo e(route('researchGroups.show',$researchGroup->id)); ?>"><i
                                            class="mdi mdi-eye"></i></a>

                                    <?php if(Auth::user()->can('update',$researchGroup)): ?>
                                    <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip"
                                        data-placement="top" title="Edit"
                                        href="<?php echo e(route('researchGroups.edit',$researchGroup->id)); ?>"><i
                                            class="mdi mdi-pencil"></i></a>
                                    <?php endif; ?>

                                    <?php if(Auth::user()->can('delete',$researchGroup)): ?>
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip"
                                        data-placement="top" title="Delete"><i class="mdi mdi-delete"></i></button>
                                    <?php endif; ?>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    
                </table>
            <!-- </div> -->
        </div>
    </div>
    

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
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
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_groups/index.blade.php ENDPATH**/ ?>