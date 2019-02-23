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
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Formula</th>
                                        <th class="text-center">Value</th>
                                        <th class="text-center">Formula Type</th>
                                        <th class="text-center">Defulat Selected</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    <?php $__currentLoopData = $payroll_group_components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll_group_component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-center"><?php echo e($i+=1); ?></td>
                                        <td class="text-center"><?php echo e($payroll_group_component->name); ?></td>

                                        <?php if($payroll_group_component->type == 1): ?>
                                         <td>Earning</td>
                                        <?php else: ?>
                                        <td>Deductation</td>
                                        <?php endif; ?>

                                        <td class="text-center"><?php echo e($payroll_group_component->formula); ?></td>
                                        <td class="text-center"><?php echo e($payroll_group_component->formula_value); ?></td>
                                        
                                        <?php if($payroll_group_component->formula_type == 1): ?>
                                         <td>Percentage</td>
                                        <?php else: ?>
                                        <td>Value</td>
                                        <?php endif; ?>

                                        <?php if($payroll_group_component->is_selected == 1): ?>
                                         <td>Yes</td>
                                        <?php else: ?>
                                        <td>No</td>
                                        <?php endif; ?>
                                        
                                        <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> Action
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-payroll-group-components/<?php echo e($payroll_group_component->id); ?>">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-payroll-group-components/<?php echo e($payroll_group_component->id); ?>">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
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