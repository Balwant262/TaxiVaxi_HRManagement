<?php $__env->startSection('content'); ?>

            <div class="mw1000 center-block">
                <?php if(session('message')): ?>
                    <?php echo e(session('message')); ?>

                <?php endif; ?>
                <?php if(Session::has('flash_message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session::get('flash_message')); ?>

                    </div>
                    <?php endif; ?>

                            <!-- -------------- Wizard -------------- -->
                    <!-- -------------- Spec Form -------------- -->
                    <div class="allcp-form">
                    <?php echo Form::open(['class' => 'add-employee']); ?>

                        <form method="post" action="/" id="custom-form-wizard">
                            <div class="wizard steps-bg steps-left">

                                <!-- -------------- step 1 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-user pr5"></i> Personal Details</h4>
                               
                                  <div class="section">



                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="hidden" value="edit-emp/<?php echo e($emps->id); ?>" id="url">


                                            <?php else: ?>
                                                <input type="hidden" value="add-employee" id="url">

                                            <?php endif; ?>

                                    </div>

                                    <!-- -------------- /section -------------- -->
                                    <div class="row">
                                    <div class="panel panel-default col-sm-4">
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee ID</h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->code): ?><?php echo e($emps->employee->code); ?><?php endif; ?>" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       placeholder="employee code...">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->name): ?><?php echo e($emps->employee->name); ?><?php endif; ?>" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       placeholder="employee name..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee Email </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="email" name="emp_email" id="emp_email" class="gui-input"
                                                       value="<?php if($emps && $emps->email): ?><?php echo e($emps->email); ?><?php endif; ?>" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="email" name="emp_email" id="emp_email" class="gui-input"
                                                       placeholder="Employee Email..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>

                                    <div class="section">
                                  <label for="input002"><h6 class="mb20 mt40">Employment Status </h6></label>
                                  <div class="option-group field">
                                      <label class="field option mb5">
                                          <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                          <input type="radio" name="emp_status" id="emp_status" value="1"
                                                 <?php if(isset($emps)): ?><?php if($emps->employee->status == '1'): ?> checked <?php endif; ?> <?php endif; ?>>
                                          <span class="radio"></span>Active</label>
                                      <label class="field option mb5">
                                          <input type="radio" name="emp_status" id="emp_status" value="0"
                                                 <?php if(isset($emps)): ?><?php if($emps->employee->status == '0'): ?> checked <?php endif; ?> <?php endif; ?>>
                                          <span class="radio"></span>Inactive</label>
                                      <?php else: ?>
                                          <input type="radio" name="emp_status" id="emp_status" value="1">
                                          <span class="radio"></span>Active</label>
                                          <label class="field option mb5">
                                              <input type="radio" name="emp_status" id="emp_status" value="0" checked>
                                              <span class="radio"></span>Inactive</label>
                                      <?php endif; ?>
                                  </div>
                              </div>


                                        <div class="section">
                                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <select class="select2-single form-control" name="role" id="role" readonly required>
                                                    <option value="">Select role</option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($emps->role->role->id == $role->id): ?>
                                                            <option value="<?php echo e($role->id); ?>" selected><?php echo e($role->name); ?></option>
                                                        <?php endif; ?>
                                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php else: ?>
                                                <select class="select2-single form-control" name="role" id="role">
                                                    <option value="">Select role</option>
                                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            <?php endif; ?>
                                        </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Gender </h6></label>
                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="gender" id="gender" checked
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->gender == '0'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio" ></span>Male</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="gender" id="gender"
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->gender == '1'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Female</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker1" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Birth </h6></label>

                                        <div class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob"
                                                       value="<?php if($emps && $emps->employee->date_of_birth): ?><?php echo e($emps->employee->date_of_birth); ?><?php endif; ?>" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob">
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Joining </h6></label>

                                        <div class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj"
                                                       value="<?php if($emps && $emps->employee->date_of_joining): ?><?php echo e($emps->employee->date_of_joining); ?><?php endif; ?>" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj">
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Mobile Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="tel" pattern="^\d{10}" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       value="<?php if($emps && $emps->employee->number): ?><?php echo e($emps->employee->number); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="tel" pattern="^\d{10}" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       placeholder="mobile number...">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                </div>    
                                
                                <div class="panel panel-default col-sm-4">
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Alternate Contact Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="tel" pattern="^\d{10}" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="<?php if($emps && $emps->employee->emergency_number): ?><?php echo e($emps->employee->emergency_number); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="tel" pattern="^\d{10}" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       placeholder="Emergency number">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Qualification </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>

                                                <?php echo Form::select('qualification_list', qualification(),$emps->employee->qualification, ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']); ?>

                                                <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification" value="<?php echo e($emps->employee->qualification); ?>"/>

                                            <?php else: ?>
                                               <?php echo Form::select('qualification_list', qualification(),'', ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']); ?>

                                               <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification"/>
                                            <?php endif; ?>
                                            </label>
                                    </div>





                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PAN Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="pan_number" id="pan_number" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->pan_number): ?><?php echo e($emps->employee->pan_number); ?><?php endif; ?>">
                                            <?php else: ?>
                                                <input type="text" placeholder="PAN" name="pan_number"
                                                       id="pan_number" class="gui-input">

                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Father's Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="father_name" id="father_name" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->father_name): ?><?php echo e($emps->employee->father_name); ?><?php endif; ?>">

                                            <?php else: ?>
                                                <input type="text" placeholder="Employees' father name"
                                                       name="father_name" id="father_name" class="gui-input">

                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Current Address </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="address" id="address" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->current_address): ?><?php echo e($emps->employee->current_address); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="current address..." name="address"
                                                       id="address" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Permanent Address </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="permanent_address" id="permanent_address"
                                                       class="gui-input"
                                                       value="<?php if($emps && $emps->employee->permanent_address): ?><?php echo e($emps->employee->permanent_address); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="permanent address..."
                                                       name="permanent_address" id="permanent_address"
                                                       class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                    <!-- -------------- /section -------------- -->
                                

                                <!-- -------------- step 2 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-user-secret pr5"></i> Employment details</h4>
                               
                                    <!-- -------------- /section -------------- -->
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Joining Formalities </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="formalities"
                                                       id="formalities"
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->formalities == '1'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Completed</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="formalities" id="formalities" checked
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->formalities == '0'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Pending</label>
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Offer Acceptance </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="offer_acceptance"
                                                       id="offer_acceptance" checked
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->offer_acceptance == '1'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Completed</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="offer_acceptance"
                                                       id="offer_acceptance"
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->offer_acceptance == '0'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Pending</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Probation Period </h6></label>

                                                <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                            <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                <option value="">Select probation period</option>
                                                    <?php if($emps->employee->probation_period == '0'): ?>
                                                        <option value="0" selected>0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif($emps->employee->probation_period == '90'): ?>
                                                        <option value="0">0 days</option>
                                                        <option value="90" selected>90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other">Other</option>
                                                    <?php elseif($emps->employee->probation_period == '180'): ?>
                                                        <option value="0">0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180" selected>180 days</option>
                                                        <option value="Other">Other</option>
                                                     <?php else: ?>
                                                        <option value="0">0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other" selected>Other</option>

                                                    <?php endif; ?>
                                            </select>
                                                    <input type="text" class="form-control probation_text hidden" id="probation_text" value=<?php echo e($emps->employee->probation_period); ?>>
                                                <?php else: ?>
                                                    <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                    <option value="">Select probation period</option>
                                                    <option value="0">0 days</option>
                                                    <option value="90">90 days</option>
                                                    <option value="180">180 days</option>
                                                    <option value="Other">Other</option>
                                                    </select>
                                            <input type="text" class="form-control probation_text hidden" id="probation_text">
                                                <?php endif; ?>


                                    </div>
                                    </div>
                                    <div class="panel panel-default col-sm-4">


                                    <div class="section">
                                        <label for="datepicker5" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Confirmation </h6></label>

                                        <div class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"
                                                       value="<?php if($emps && $emps->employee->date_of_confirmation): ?><?php echo e($emps->employee->date_of_confirmation); ?><?php endif; ?>"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            <?php endif; ?>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                                            <select class="select2-single form-control" name="department" id="department">
                                                <option value="">Select department</option>
                                                <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                    <?php if($emps->employee->department == 'Software Engineering'): ?>
                                                        <option value="Software Engineering" selected>Software Engineering</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="IT">IT</option>
                                                    <?php elseif($emps->employee->department == 'Sales'): ?>
                                                        <option value="Software Engineering">Software Engineering</option>
                                                        <option value="Sales" selected>Sales</option>
                                                        <option value="IT">IT</option>
                                                    <?php else: ?>
                                                        <option value="Software Engineering">Software Engineering</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="IT" selected>IT</option>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <option value="Software Engineering">Software Engineering</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="IT">IT</option>
                                                <?php endif; ?>
                                            </select>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Salary on Confirmation </h6>
                                        </label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="salary" id="salary" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->salary): ?><?php echo e($emps->employee->salary); ?><?php endif; ?>" readonly>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="e.g 10000" name="salary"
                                                       id="salary" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>
                                    <!-- -------------- /section -------------- -->


                               

                                <!-- -------------- step 3 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-file-text pr5"></i> Banking Details</h4>
                               


                                    <!-- -------------- /section -------------- -->


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Bank Account Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="account_number" id="bank_account_number"
                                                       class="gui-input"
                                                       value="<?php if($emps && $emps->employee->account_number): ?><?php echo e($emps->employee->account_number); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="Bank account number"
                                                       name="account_number" id="bank_account_number" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Bank Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="bank_name" id="bank_name" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->bank_name): ?><?php echo e($emps->employee->bank_name); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="name of bank..." name="bank_name"
                                                       id="bank_name" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> IFSC Code </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="ifsc_code" id="ifsc_code" class="gui-input"
                                                       value="<?php if($emps && $emps->employee->ifsc_code): ?><?php echo e($emps->employee->ifsc_code); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="ifsc code..." name="ifsc_code"
                                                       id="ifsc_code" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PF Account Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                                <input type="text" name="pf_account_number" id="pf_account_number"
                                                       class="gui-input"
                                                       value="<?php if($emps && $emps->employee->pf_account_number): ?><?php echo e($emps->employee->pf_account_number); ?><?php endif; ?>">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            <?php else: ?>
                                                <input type="text" placeholder="PF account number..."
                                                       name="pf_account_number" id="pf_account_number"
                                                       class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            <?php endif; ?>
                                        </label>
                                    </div>

                                   <div class="section">
                                       <label for="input002"><h6 class="mb20 mt40"> UAN Number</h6></label>
                                       <label for="input002" class="field prepend-icon">
                                           <?php if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}'): ?>
                                              <input type="text" name="un_number" id="un_number" class="gui-input"
                                              value="<?php if($emps && $emps->employee->un_number): ?><?php echo e($emps->employee->un_number); ?><?php endif; ?>">
                                               <label for="input002" class="field-icon">
                                                   <i class="fa fa-list"></i>
                                               </label>
                                           <?php else: ?>
                                             <input type="text" placeholder="UN Number" name="un_number" id="un_number" class="gui-input">
                                              <label for="input002" class="field-icon">
                                                  <i class="fa fa-list"></i>
                                              </label>
                                           <?php endif; ?>
                                       </label>
                                   </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PF Status </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="pf_status" id="pf_status"
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->pf_status == '1'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Active</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="pf_status" id="pf_status" checked
                                                       <?php if(isset($emps)): ?><?php if($emps->employee->pf_status == '0'): ?>checked <?php endif; ?> <?php endif; ?>>
                                                <span class="radio"></span>Inactive</label>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="section">
                                        <div>

                                                <input type="hidden" value="{<?php echo csrf_token(); ?>}" id="token">
                                                <input type="submit" value="Save" class="form-control btn btn-bordered btn-info btn-block">


                                        </div>
                                    </div>
                                  
                            </div>
                            <!-- -------------- /Wizard -------------- -->

                        </form>
                        <!-- -------------- /Form -------------- -->
                        <?php echo Form::close(); ?>

                    </div>
                    <!-- -------------- /Spec Form -------------- -->

            </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
   <script src="/assets/js/custom.js"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>