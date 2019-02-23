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
                            <span class="panel-title hidden-xs"> GoodThoughts Lists </span>
                        </div>
                        <div class="panel-body pn">
                            <?php if(Session::has('flash_message')): ?>
                                <div class="alert alert-success">
                                    <?php echo e(Session::get('flash_message')); ?>

                                </div>
                            <?php endif; ?>
                            <?php echo Form::open(['class' => 'form-horizontal']); ?>

                            <div class="table-responsive">
                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                    <th class="text-center">Id</th>
                                    <th class="text-center">GoodThoughts</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Date & Time</th>
                                    
                                    </tr>
                                   </thead>

                                    <tbody>
                                    <?php $i =0;?>
                            <?php $__currentLoopData = $goodthoughts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $goodthought): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($i+=1); ?></td>
                                    <td class="text-center"><?php echo e($goodthought->name); ?></td>
                                    <td class="text-center"><?php echo e($goodthought->details); ?></td>
                                    <td class="text-center"><?php echo e($goodthought->date_time); ?></td>
                                    <?php if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager()): ?>
                                    <td class="text-center">
                                        <div class="btn-group text-right">
                                            <button type="button"
                                                    class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false"> Action
                                                <span class="caret ml5"></span>
                                            </button>
                                            <ul class="dropdown-menu" goodthoughts="menu">
                                                <li>
                                                    <a href="/edit-goodthoughts/<?php echo e($goodthought->id); ?>">Edit</a>
                                                </li>
                                                <li>
                                                    <a href="/delete-goodthoughts/<?php echo e($goodthought->id); ?>">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <?php echo $goodthoughts->render(); ?>

                            </tr>
                            </tbody>
                                </table>
                            </div>
                            <?php echo Form::close(); ?>

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