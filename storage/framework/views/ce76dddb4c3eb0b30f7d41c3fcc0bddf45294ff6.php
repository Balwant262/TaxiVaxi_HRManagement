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
                            <span class="panel-title hidden-xs">Employee Basic Salary</span><br />
                        </div><br />
                        <?php if(Session::has('failed')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(Session::get('failed')); ?>

                            </div>
                        <?php endif; ?>
                        

                        <div class="panel-body pn">
                            <?php if(Session::has('flash_message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('flash_message')); ?>

                                    </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Basic salary</th>
                                        <th class="text-center">Generate salary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    <td class="text-center"><?php echo e($emp->id); ?></td>
                                        <td class="text-center"><?php echo e($emp->name); ?></td>
                                        <td class="text-center"><?php echo e($emp->department); ?></td>
                                        <td class="text-center"><span class="fa fa-rupee"></span> 
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($user->id === $emp->user_id): ?>
                                            <?php echo e($emp->salary); ?>

                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="text-center"><a href="/generate-salary-slip-single-employee/<?php echo e($emp->user_id); ?>"><span class="pull-right btn btn-bordered btn-success">Select Componant</span><br /></a></td>
                                        <!-- <td class="text-center"><a href="/downloadPDF/<?php echo e($emp->user_id); ?>" target="_blank"><span class="pull-right btn btn-bordered btn-success" >Generate</span><br /></a></td> -->
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                    </tr>
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

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>