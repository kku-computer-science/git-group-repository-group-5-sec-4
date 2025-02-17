<?php $__env->startSection('content'); ?>

<div class="container refund">
    <p><?php echo e(__('message.project_service')); ?></p>

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;"><?php echo e(__('message.no')); ?></th>
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('message.year')); ?></th>
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('message.project_name')); ?></th>
                    <th class="col-md-4" style="font-weight: bold;"><?php echo e(__('message.details')); ?></th>
                    <th class="col-md-2" style="font-weight: bold;"><?php echo e(__('message.project_responsible')); ?></th>
                    <th class="col-md-1" style="font-weight: bold;"><?php echo e(__('message.status')); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $resp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $re): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="vertical-align: top;text-align: left;"><?php echo e($i+1); ?></td>
                    <td style="vertical-align: top;text-align: left;"><?php echo e(($re->project_year)+543); ?></td>
                    <td style="vertical-align: top;text-align: left;">
                        <?php echo e($re->project_name); ?>

                    </td>
                    <td>
                        <div style="padding-bottom: 10px">
                            <?php if($re->project_start != null): ?>
                            <span style="font-weight: bold;">
                                <?php echo e(__('message.project_duration')); ?>

                            </span>
                            <span style="padding-left: 10px;">
                                <?php echo e(\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y')); ?> <?php echo e(__('message.to')); ?> <?php echo e(\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y')); ?>

                            </span>
                            <?php else: ?>
                            <span style="font-weight: bold;">
                                <?php echo e(__('message.project_duration')); ?>

                            </span>
                            <span></span>
                            <?php endif; ?>
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('message.research_fund_type')); ?></span>
                            <span style="padding-left: 10px;"> <?php if(is_null($re->fund)): ?> <?php else: ?> <?php echo e($re->fund->fund_type); ?> <?php endif; ?></span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('message.funding_agency')); ?></span>
                            <span style="padding-left: 10px;"> <?php if(is_null($re->fund)): ?> <?php else: ?> <?php echo e($re->fund->support_resource); ?> <?php endif; ?></span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('message.responsible_department')); ?></span>
                            <span style="padding-left: 10px;">
                                <?php echo e($re->responsible_department); ?>

                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;"><?php echo e(__('message.budget_allocated')); ?></span>
                            <span style="padding-left: 10px;"> <?php echo e(number_format($re->budget)); ?> <?php echo e(__('message.baht')); ?></span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                    <div style="padding-bottom: 10px;">
                        <span>
                            <?php $__currentLoopData = $re->user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(app()->getLocale() == 'th'): ?>
                                    <?php echo e($user->position_th); ?> <?php echo e($user->fname_th); ?> <?php echo e($user->lname_th); ?>

                                <?php elseif(app()->getLocale() == 'en' || app()->getLocale() == 'cn'): ?>
                                    <?php echo e($user->position_en); ?> <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?>

                                <?php else: ?>
                                    <?php echo e($user->position_en); ?> <?php echo e($user->fname_en); ?> <?php echo e($user->lname_en); ?> <!-- กรณี fallback -->
                                <?php endif; ?>
                                <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>

                    </td>
                    <?php if($re->status == 1): ?>
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success"><?php echo e(__('message.submitted')); ?></label></h6>
                    </td>
                    <?php elseif($re->status == 2): ?>
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark"><?php echo e(__('message.in_progress')); ?></label></h6>
                    </td>
                    <?php else: ?>
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark"><?php echo e(__('message.closed')); ?></label></h6>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function() {

        var table1 = $('#example1').DataTable({
            responsive: true,
            language: {
                search: "<?php echo e(__('message.search')); ?>" ,
                lengthMenu: "<?php echo e(__('message.show_entries', ['entries' => '_MENU_'])); ?>",
                info: "<?php echo e(__('message.showing_entries', ['start' => '_START_', 'end' => '_END_', 'total' => '_TOTAL_'])); ?>",
                paginate: {
                    first: "<?php echo e(__('message.first')); ?>",
                    last: "<?php echo e(__('message.last')); ?>",
                    next: "<?php echo e(__('message.next')); ?>",
                    previous: "<?php echo e(__('message.previous')); ?>"
                }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/research_proj.blade.php ENDPATH**/ ?>