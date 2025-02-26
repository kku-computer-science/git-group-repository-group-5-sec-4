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
                <h4 class="card-title"><?php echo e(trans('message.Book_navbar_title')); ?></h4>
                <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="<?php echo e(route('books.create')); ?>"><i
                        class="mdi mdi-plus btn-icon-prepend"></i> <?php echo e(trans('message.Add_book')); ?> </a>
                <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(trans('message.Book_no')); ?></th>
                            <th><?php echo e(trans('message.Book_title')); ?></th>
                            <th><?php echo e(trans('message.Book_year')); ?></th>
                            <th><?php echo e(trans('message.Book_source')); ?></th>
                            <th><?php echo e(trans('message.Book_page')); ?></th>
                            <th width="280px"><?php echo e(trans('message.Book_action')); ?></th>
                        </tr>
                        <thead>
                        <tbody>
                            <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $paper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i + 1); ?></td>
                                    <td><?php echo e(Str::limit($paper->ac_name, 50)); ?></td>
                                    <td><?php echo e(date('Y', strtotime($paper->ac_year)) + 543); ?></td>
                                    <td>
                                        <?php if(App::getLocale() == 'th'): ?>
                                            <?php echo e(Str::limit($paper->ac_sourcetitle, 50)); ?>

                                        <?php elseif(App::getLocale() == 'en'): ?>
                                            <?php echo e(Str::limit($paper->ac_sourcetitle_en, 50)); ?>

                                        <?php elseif(App::getLocale() == 'cn'): ?>
                                            <?php echo e(Str::limit($paper->ac_sourcetitle_cn, 50)); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($paper->ac_page); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('books.destroy', $paper->id)); ?>" method="POST">

                                            <!-- <a class="btn btn-info" href="<?php echo e(route('books.show', $paper->id)); ?>">Show</a> -->
                                            <li class="list-inline-item">
                                                <a class="btn btn-outline-primary btn-sm" type="button"
                                                    data-toggle="tooltip" data-placement="top" title="view"
                                                    href="<?php echo e(route('books.show', $paper->id)); ?>"><i
                                                        class="mdi mdi-eye"></i></a>
                                            </li>
                                            <!-- <a class="btn btn-primary" href="<?php echo e(route('books.edit', $paper->id)); ?>">Edit</a> -->
                                            <?php if(Auth::user()->can('update', $paper)): ?>
                                                <li class="list-inline-item">
                                                    <a class="btn btn-outline-success btn-sm" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"
                                                        href="<?php echo e(route('books.edit', $paper->id)); ?>"><i
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
                <br>

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
                        swal("Delete Successfully", {
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

<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/books/index.blade.php ENDPATH**/ ?>