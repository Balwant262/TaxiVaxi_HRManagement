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
                                <span class="panel-title hidden-xs"> Announcement Lists </span>
                            </div>
                            <div class="panel-body pn">
                                <?php if(Session::has('flash_message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('flash_message')); ?>

                                </div>
                                <?php endif; ?>
                                <?php echo Form::open(['class' => 'form-horizontal']); ?>

                                <div class="table-responsive">
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                        <thead>

                                        </thead>

                                        <tbody>
                                            <?php $i =0;?>
                                            <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <table class="table table-bordered nobodytable" tabindex="0">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%">Date & Time</th>
                                                        <td style="width:80%"><?php echo e($announcement->date_time); ?></td>
                                                        <?php if(\Auth::user()->isAdmin || \Auth::user()->isHR() ||
                                                        \Auth::user()->isManager()): ?>
                                                        <td class="text-center" style="width:10%">
                                                            <div class="btn-group text-right">
                                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    Action
                                                                    <span class="caret ml5"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" notification="menu">
                                                                    <li>
                                                                        <a href="/edit-announcement/<?php echo e($announcement->id); ?>">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/delete-announcement/<?php echo e($announcement->id); ?>">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%">Title</th>
                                                        <td style="width:80%"><?php echo e($announcement->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%"> Details </th>
                                                        <td style="background-color:#edf3ff; font-size: 14px; width:80%"><b><?php echo e($announcement->details); ?></b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <br>
                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php echo $announcements->render(); ?>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>