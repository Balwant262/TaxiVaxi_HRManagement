<?php $__env->startSection('content'); ?>
    <!-- START CONTENT -->
    <div class="content">


        <!-- -------------- Content -------------- -->
        <section id="content" class="table-layout animated fadeIn">

            <!-- -------------- Column Center -------------- -->
            <div class="chute chute-center">

                <!-- -------------- Products Status Table -------------- -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> Attendance List for user: </span><br />
                            </div><br />
                            <div class="panel-body pn">
                                <?php if(Session::has('flash_message')): ?>
                                    <div class="alert alert-success">
                                        <?php echo e(Session::get('flash_message')); ?>

                                    </div>
                                <?php endif; ?>
                                <div class="table-responsive">
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <?php if(count($attendances)): ?>
                                      <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">Clock In Time</th>
                                            <th class="text-center">Clock Out Time</th>
                                            <th class="text-center">Day Status (Full\Half day)</th>
                                        </tr>
                                        </thead>
                                        <?php else: ?>
                                            <h2>Nothing to show</h2>
                                        <?php endif; ?>
                                        <tbody>
                                          <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="text-center"><?php echo e($attendance->clock_in); ?></td>
                                                <td class="text-center"><?php echo e($attendance->clock_out); ?></td>
                                                <td class="text-center"><?php echo e($attendance->day_status); ?></td>
                                            </tr>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="/assets/js/custom.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>