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
                            <span class="panel-title hidden-xs">Employee Lists</span><br />
                        </div><br />
                        <?php if(Session::has('failed')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(Session::get('failed')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="panel-menu allcp-form theme-primary mtn">
                        <div class="row">
                            <?php echo Form::open(); ?>

                            <div class="col-md-3">
                                <input type="text" class="field form-control" placeholder="search employee" style="height:40px" value="<?php echo e($string); ?>" name="string">
                            </div>
                            <div class="col-md-3">
                                <label class="field select">
                                    <?php echo Form::select('column', getEmployeeDropDown(),$column); ?>

                                    <i class="arrow double"></i>
                                </label>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Search" name="button" class="btn btn-primary">
                            </div>

                            <?php echo Form::close(); ?>


                        </div>
                            </div>

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
                                        <th class="text-center">Code</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Joining Date</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Mobile Number</th>
                                        <th class="text-center">Department</th>
                                        <?php if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager()): ?>
                                        <th class="text-center">Actions</th>
                                        <?php endif; ?>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($i+=1); ?></td>
                                        <td class="text-center"><?php echo e($emp->employee['code']); ?></td>
                                        <td class="text-center"><?php echo e($emp->name); ?></td>
                                        <td class="text-center"><?php echo e(convertStatusBack($emp->employee['status'])); ?></td>
                                        <td class="text-center"><?php echo e(isset($emp->role->role->name)?$emp->role->role->name:''); ?></td>
                                        <td class="text-center"><?php echo e(date('Y-m-d', strtotime($emp->employee['date_of_joining']))); ?></td>
                                        <td class="text-center"><?php echo e($emp->employee['current_address']); ?></td>
                                        <td class="text-center"><?php echo e($emp->employee['number']); ?></td>
                                        <td class="text-center"><?php echo e($emp->employee['department']); ?></td>
                                        <?php if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager()): ?>
                                        <td class="text-center">
                                            <div class="btn-group text-right">
                                                <button type="button"
                                                        class="btn btn-info br2 btn-xs fs12 dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false"> Action
                                                    <span class="caret ml5"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="/edit-emp/<?php echo e($emp->id); ?>">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a href="/delete-emp/<?php echo e($emp->id); ?>">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr><td colspan="10">
                                            <?php echo $emps->render(); ?>

                                        </td>
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