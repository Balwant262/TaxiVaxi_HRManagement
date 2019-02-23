<?php $__env->startSection('content'); ?>
<div class="panel panel-info ">
      <div class="panel-heading">
      <marquee behavior="scroll" direction="left" >
      <?php $__currentLoopData = $goodthoughts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goodthought): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <ul style="display: inline;">
        <li style="display: inline;"> 
            <h5 style="display: inline; color: white;">
            &#xe124; &nbsp;&nbsp; <?php echo e($goodthought->details); ?> &nbsp;&nbsp; &#xe124;
            </h5>
        </li>
      </ul>
      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </marquee></div>
</div>
<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- -------------- Column Center -------------- -->
    <div class="chute chute-center">

        <!-- -------------- Quick Links -------------- -->
        <div class="row">

       
            <img src="/assets/img/taxivaxi img1.png" alt="" class="img-responsive mauto"/>
           
        </div>

        <div>
                <div class="col-sm-6 col-xl-3">
                    <h5 class="mt40 mb20"><a href="/dashboard"><i class="fa fa-arrow-circle-o-left"> Dashboard </i></a></h5>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <h5 class="mt40 mb20"><a href="/profile"> Profile <i class="fa fa-arrow-circle-o-right"> </i></a></h5>
                </div>
            </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>