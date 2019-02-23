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
                            <div class="table-responsive">
                            <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Salary Slip PDF</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">January</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/January/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_January_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">February</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/February/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_February_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">March</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/March/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_March_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">April</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/April/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_April_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">May</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/May/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_May_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">June</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/June/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_June_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">July</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/July/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_July_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">August</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/August/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_August_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">September</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/September/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_September_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">October</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/October/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_October_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">November</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/November/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_November_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><?php echo e($id); ?></td>
                                            <td class="text-center"><?php echo e($year_id); ?></td>
                                            <td class="text-center">December</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/<?php echo e($year_id); ?>/December/<?php echo e($id); ?>. <?php echo e(Auth::user()->name); ?>/<?php echo e($id); ?>_<?php echo e(Auth::user()->name); ?>_December_<?php echo e($year_id); ?>.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
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
<?php $__env->startPush('scripts'); ?>

<script>
$(document).ready(function() {
  $('button').on('click', function() {
    var oldUrl = $(this).data('value');
        $.ajax({
            url: window.location.origin+oldUrl,
            type:'HEAD',
            error: function()
            {
                //file not exists
                alert('Your Payment Slip Not Generated');
                alert(oldUrl);
                
            },
            success: function()
            {
                //file exists
                //alert('file exists');
                //alert(oldUrl);
                window.open(window.location.origin+oldUrl);
            }
    });
  });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>