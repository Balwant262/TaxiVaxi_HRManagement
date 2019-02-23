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
                            <span class="panel-title hidden-xs">Select Year To View Salary Slip</span><br />
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
                            <div class="">
                                <form action="/salary_slip_single_emp_DownloadPDF/<?php echo e(Auth::user()->id); ?>" method="POST">
                                <?php echo e(csrf_field()); ?>


                                <select class="form-control" name="year_id" >
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                </select>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                                    <br/>
                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="View Salary Slip">
                                    
                                </form>
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