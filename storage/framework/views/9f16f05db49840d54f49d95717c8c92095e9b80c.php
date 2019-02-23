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
                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}'): ?>
                                <span class="panel-title hidden-xs"> Edit Role </span>
                                <?php else: ?>
                                   <span class="panel-title hidden-xs"> Add Role </span>
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
                                            <label class="col-md-3 control-label"> Role </label>
                                            <div class="col-md-6">
                                                <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}'): ?>
                                                <input type="text" name="name" id="input002" class="select2-single form-control" value="<?php if($result && $result->name): ?><?php echo e($result->name); ?><?php endif; ?>" required>
                                                <?php else: ?>
                                                    <input type="text" name="name" id="input002" class="select2-single form-control" placeholder="Role" required>
                                                <?php endif; ?>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Description </label>
                                            <div class="col-md-6">

                                                    <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-role/{id}'): ?>
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" name="description" required><?php if($result && $result->description): ?><?php echo e($result->description); ?><?php endif; ?></textarea>
                                                    <?php else: ?>
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" placeholder="Role Description" name="description" required></textarea>
                                                    <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                           </div>
                                            <div class="col-md-2"><a href="/add-role" >
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

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>