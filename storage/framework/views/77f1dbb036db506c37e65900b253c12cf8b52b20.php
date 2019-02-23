<?php $__env->startSection('content'); ?>

        <div class="container">
 
            <div class="panel panel-primary">
              <div style="color:white;" class="panel-heading">Event Details</div>
              <div class="panel-body" >
                <div id='calendar'></div>
              </div>
            </div>
 
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('calanderevent.calenderLayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>