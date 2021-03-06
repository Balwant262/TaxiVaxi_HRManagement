<?php $__env->startSection('content'); ?>
        <!-- START CONTENT -->
<div class="content">

    
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Edit Team </span>
                        </div>

                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <div class="panel-body p25 pb10">

                                    <?php if(Session::has('flash_message')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(Session::get('flash_message')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php echo Form::open(['class' => 'form-horizontal']); ?>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Team Name </label>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="name of team..." name="team_name"
                                                       value="<?php echo e($edit[0]->name); ?>" class="select2-single form-control" required>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Select Team Manager</label>
                                            <div class="col-md-6">
                                                <select class="selectpicker form-control" data-done-button="true"
                                                        name="manager_id" required>
                                                    <option value="" selected>Select One</option>
                                                    <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($edit[0]->manager->id == $manager->id): ?>
                                                            <option value="<?php echo e($manager->id); ?>" selected><?php echo e($manager->name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($manager->id); ?>"><?php echo e($manager->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Select Team Leader</label>
                                            <div class="col-md-6">
                                                <select class="selectpicker form-control" data-done-button="true"
                                                        name="leader_id" required>
                                                    <option value="" selected>Select One</option>
                                                    <?php $__currentLoopData = $leaders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($edit[0]->leader->id == $leader->id): ?>
                                                            <option value="<?php echo e($leader->id); ?>" selected><?php echo e($leader->name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($leader->id); ?>"><?php echo e($leader->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Select Team Members </label>
                                            <div class="col-md-6">
                                                <select id="done" class="selectpicker form-control"
                                                        multiple data-done-button="true" name="member_id[]" required>
                                                    <?php $__currentLoopData = $emps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(in_array($emp->id,$team_member)): ?>
                                                            <option value="<?php echo e($emp->id); ?>" selected><?php echo e($emp->name); ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->name); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                            </div>
                                            <div class="col-md-2">
                                                <a href="/edit-team/{id}" >

                                                    <input type="button" value="Reset" class="btn btn-bordered btn-success btn-block"></a>
                                            </div>
                                        </div>
                                        <?php echo Form::close(); ?>

                                        
                                </div>
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
    <script src="/assets/allcp/forms/js/bootstrap-select.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>