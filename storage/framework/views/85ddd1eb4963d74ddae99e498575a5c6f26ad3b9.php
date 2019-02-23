<?php $__env->startSection('content'); ?>
    <!-- START CONTENT -->
    <div class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="allcp-form top-buffer">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section">
                                <label for="comment" class="field prepend-icon">
                          <textarea class="gui-textarea br-b-l-r0 br-b-r-r0" id="status" name="status"
                                    placeholder="Share your status in 270 characters"
                                    style="padding-left:100px"></textarea>
                                    <label for="comment" class="field-icon">
                                        <img src="<?php echo e(isset(\Auth::user()->employee) ? \Auth::user()->employee->photo : '/assets/img/avatars/profile_pic.png'); ?>"
                                             width="80px" height="80px" style="padding-top: 10px; padding-left: 8px"
                                             class="img-responsive">
                                    </label>
                                    <div class="input-footer br-b-l-r3 br-b-r-r3">
                                        <div style="padding-left:90%" id="post-button">
                                            <input type="button" class="btn btn-success" id="post-update" value="Post">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-12">
                        <div class="allcp-form append-post">
                            <div class="row">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <?php if(\Auth::user()->employee->photo): ?>
                                                    <img src="/assets/img/avatars/profile_avatar.jpg"
                                                         width="80px"
                                                         height="80px">
                                                    <br/>
                                                    <div class="small-help-block"> <?php echo e(\Auth::user()->name); ?></div>
                                                <?php else: ?>
                                                    <img src="/assets/img/avatars/profile_pic.png" width="80px"
                                                         height="80px">
                                                    <br/>
                                                    <div class="small-help-block"> <?php echo e(\Auth::user()->name); ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-md-10">
                                                <strong><?php echo e($post->status); ?></strong>
                                                <div class="small-help-block"><?php echo e(formatDate($post->created_at)); ?></div>
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="container-for-reply-<?php echo e($post->id); ?>">
                                            <?php $__currentLoopData = $post->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img src="<?php echo e(getUserData($reply->user_id)['employee']['photo']); ?>"
                                                             width="80px"
                                                             height="80px">
                                                        <div class="small-help-block"> <?php echo e(getUserData($reply->user_id)['name']); ?></div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php echo e($reply->message); ?>

                                                        <div class="small-help-block"><?php echo e(formatDate($reply->created_at)); ?></div>
                                                    </div>
                                                </div>
                                                <hr/>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <!-- reply box -->
                                        <div class="section">
                                            <label for="comment" class="field prepend-icon">
                          <textarea class="gui-textarea br-b-l-r0 br-b-r-r0 reply" name="status"
                                    placeholder="Type your reply in 360 characters"
                                    style="padding-left:100px"></textarea>
                                                <label for="comment" class="field-icon">
                                                    <img src="/assets/img/avatars/profile_avatar.jpg"
                                                         width="80px" height="80px"
                                                         style="padding-top: 10px; padding-left: 8px">
                                                </label>
                                                <div class="input-footer br-b-l-r3 br-b-r-r3">
                                                    <div style="padding-left:85%" class="reply-button">
                                                        <input type="button" class="btn btn-success post-reply"
                                                               data-post_id="<?php echo e($post->id); ?>" value="Reply">
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <!-- /reply box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
        </div>
    </div>
    <!-- END CONTENT -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>