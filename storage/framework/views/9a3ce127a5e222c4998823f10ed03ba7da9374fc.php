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
                                    <span class="panel-title hidden-xs"> Add Expense</span>
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
                                            <label class="col-md-3 control-label"> Item </label>
                                            <div class="col-md-6">
                                                <input type="text" name="item" id="input002" class=" form-control" placeholder="Item bought" required>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Purchase From</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="purchase_from" id="input002" class=" form-control" placeholder="Item bought from" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                            <label for="datepicker1" class="col-md-3 control-label"> Date of Purchase </label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar text-alert pr11"></i>
                                                    </div>

                                                        <input type="text" id="datepicker1" class="select2-single form-control" name="date_of_purchase" required>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"> Amount</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="amount" id="input002" class=" form-control" placeholder="price" required>
                                                </div>
                                            </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                            </div>
                                            
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

    </section>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script src="/assets/js/pages/forms-widgets.js"></script>
    <script src="/assets/js/custom.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>