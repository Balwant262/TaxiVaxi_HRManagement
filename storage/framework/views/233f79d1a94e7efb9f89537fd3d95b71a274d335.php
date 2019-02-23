<?php $__env->startSection('content'); ?>
        <!-- START CONTENT -->
<div class="content">

  
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn" >
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-goodthoughts/{id}'): ?>
                                <span class="panel-title hidden-xs"> Edit goodthoughts </span>
                                <?php else: ?>
                                   <span class="panel-title hidden-xs"> Add goodthoughts </span>
                               <?php endif; ?>
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
                                            <label class="col-md-3 control-label"> GoodThoughts </label>
                                            <div class="col-md-6">
                                                <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-goodthoughts/{id}'): ?>
                                                <input type="text" name="name" id="input002" class="select2-single form-control" value="<?php if($result && $result->name): ?><?php echo e($result->name); ?><?php endif; ?>" required>
                                                <?php else: ?>
                                                    <input type="text" name="name" id="input002" class="select2-single form-control" placeholder="GoodThoughts" required>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Description </label>
                                            <div class="col-md-6">

                                                    <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-goodthoughts/{id}'): ?>
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" name="description" required><?php if($result && $result->details): ?><?php echo e($result->details); ?><?php endif; ?></textarea>
                                                    <?php else: ?>
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" placeholder="GoodThoughts Description" name="description" required></textarea>
                                                    <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Date & Time </label>
                                            <div class="col-md-6">

                                                    <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-goodthoughts/{id}'): ?>
                                                    <input id="datetimepicker1" type="text" name="date_time" class="select2-single form-control" value="<?php if($result && $result->date_time): ?><?php echo e($result->date_time); ?><?php endif; ?>" required>
                                                    <?php else: ?>
                                                    <input id="datetimepicker1" type="text" name="date_time" class="select2-single form-control" required>
                                                    <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                           </div>
                                            <div class="col-md-2"><a href="/add-goodthoughts" >
                                                    <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
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
   <script src="/assets/js/custom.js"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>