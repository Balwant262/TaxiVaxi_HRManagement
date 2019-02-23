@extends('layouts.base')

@section('content')

            <div class="mw1000 center-block">
                @if(session('message'))
                    {{session('message')}}
                @endif
                @if(Session::has('flash_message'))
                    <div class="alert alert-success">
                        {{ session::get('flash_message') }}
                    </div>
                    @endif

                            <!-- -------------- Wizard -------------- -->
                    <!-- -------------- Spec Form -------------- -->
                    <div class="allcp-form">
                    {!! Form::open(['class' => 'add-employee']) !!}
                        <form method="post" action="/" id="custom-form-wizard">
                            <div class="wizard steps-bg steps-left">

                                <!-- -------------- step 1 -------------- -->
                                <h4 class="wizard-section-title">
                                    <i class="fa fa-user pr5"></i> Personal Details</h4>
                               
                                  <div class="section">



                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="hidden" value="edit-emp/{{$emps->id}}" id="url">


                                            @else
                                                <input type="hidden" value="add-employee" id="url">

                                            @endif

                                    </div>

                                    <!-- -------------- /section -------------- -->
                                    <div class="row">
                                    <div class="panel panel-default col-sm-4">
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee ID</h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       value="@if($emps && $emps->employee->code){{$emps->employee->code}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            @else
                                                <input type="text" name="emp_code" id="emp_code" class="gui-input"
                                                       placeholder="employee code...">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-barcode"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->name){{$emps->employee->name}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @else
                                                <input type="text" name="emp_name" id="emp_name" class="gui-input"
                                                       placeholder="employee name..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40">Employee Email </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="email" name="emp_email" id="emp_email" class="gui-input"
                                                       value="@if($emps && $emps->email){{$emps->email}}@endif" required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @else
                                                <input type="email" name="emp_email" id="emp_email" class="gui-input"
                                                       placeholder="Employee Email..." required>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-user"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="section">
                                  <label for="input002"><h6 class="mb20 mt40">Employment Status </h6></label>
                                  <div class="option-group field">
                                      <label class="field option mb5">
                                          @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                          <input type="radio" name="emp_status" id="emp_status" value="1"
                                                 @if(isset($emps))@if($emps->employee->status == '1') checked @endif @endif>
                                          <span class="radio"></span>Active</label>
                                      <label class="field option mb5">
                                          <input type="radio" name="emp_status" id="emp_status" value="0"
                                                 @if(isset($emps))@if($emps->employee->status == '0') checked @endif @endif>
                                          <span class="radio"></span>Inactive</label>
                                      @else
                                          <input type="radio" name="emp_status" id="emp_status" value="1">
                                          <span class="radio"></span>Active</label>
                                          <label class="field option mb5">
                                              <input type="radio" name="emp_status" id="emp_status" value="0" checked>
                                              <span class="radio"></span>Inactive</label>
                                      @endif
                                  </div>
                              </div>


                                        <div class="section">
                                            <label for="input002"><h6 class="mb20 mt40"> Role </h6></label>
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <select class="select2-single form-control" name="role" id="role" readonly required>
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        @if($emps->role->role->id == $role->id)
                                                            <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                        @endif
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                                @else
                                                <select class="select2-single form-control" name="role" id="role">
                                                    <option value="">Select role</option>
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Gender </h6></label>
                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="gender" id="gender" checked
                                                       @if(isset($emps))@if($emps->employee->gender == '0')checked @endif @endif>
                                                <span class="radio" ></span>Male</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="gender" id="gender"
                                                       @if(isset($emps))@if($emps->employee->gender == '1')checked @endif @endif>
                                                <span class="radio"></span>Female</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker1" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Birth </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob"
                                                       value="@if($emps && $emps->employee->date_of_birth){{$emps->employee->date_of_birth}}@endif" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker1" class="gui-input fs13" name="dob">
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="datepicker4" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Joining </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj"
                                                       value="@if($emps && $emps->employee->date_of_joining){{$emps->employee->date_of_joining}}@endif" required>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker4" class="gui-input fs13" name="doj">
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Mobile Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="tel" pattern="^\d{10}" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       value="@if($emps && $emps->employee->number){{$emps->employee->number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @else
                                                <input type="tel" pattern="^\d{10}" name="mob_number" id="mobile_phone"
                                                       class="gui-input phone-group" maxlength="10" minlength="10" required
                                                       placeholder="mobile number...">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>
                                </div>    
                                
                                <div class="panel panel-default col-sm-4">
                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Alternate Contact Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="tel" pattern="^\d{10}" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       value="@if($emps && $emps->employee->emergency_number){{$emps->employee->emergency_number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @else
                                                <input type="tel" pattern="^\d{10}" name="emer_number" id="emergency_number"
                                                       class="gui-input phone-group" maxlength="10" minlength="10"
                                                       placeholder="Emergency number">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-mobile-phone"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Qualification </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')

                                                {!! Form::select('qualification_list', qualification(),$emps->employee->qualification, ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                                <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification" value="{{$emps->employee->qualification}}"/>

                                            @else
                                               {!! Form::select('qualification_list', qualification(),'', ['class' => 'select2-single form-control qualification_select', 'id' => 'qualification']) !!}
                                               <input type="text" id="qualification" class="gui-input form-control hidden qualification_text" placeholder="enter other qualification"/>
                                            @endif
                                            </label>
                                    </div>





                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PAN Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="pan_number" id="pan_number" class="gui-input"
                                                       value="@if($emps && $emps->employee->pan_number){{$emps->employee->pan_number}}@endif">
                                            @else
                                                <input type="text" placeholder="PAN" name="pan_number"
                                                       id="pan_number" class="gui-input">

                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Father's Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="father_name" id="father_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->father_name){{$emps->employee->father_name}}@endif">

                                            @else
                                                <input type="text" placeholder="Employees' father name"
                                                       name="father_name" id="father_name" class="gui-input">

                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Current Address </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="address" id="address" class="gui-input"
                                                       value="@if($emps && $emps->employee->current_address){{$emps->employee->current_address}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="current address..." name="address"
                                                       id="address" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-map-marker"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Permanent Address </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="permanent_address" id="permanent_address"
                                                       class="gui-input"
                                                       value="@if($emps && $emps->employee->permanent_address){{$emps->employee->permanent_address}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="permanent address..."
                                                       name="permanent_address" id="permanent_address"
                                                       class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-location-arrow"></i>
                                                </label>
                                            @endif
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
                                                       @if(isset($emps))@if($emps->employee->formalities == '1')checked @endif @endif>
                                                <span class="radio"></span>Completed</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="formalities" id="formalities" checked
                                                       @if(isset($emps))@if($emps->employee->formalities == '0')checked @endif @endif>
                                                <span class="radio"></span>Pending</label>
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Offer Acceptance </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="offer_acceptance"
                                                       id="offer_acceptance" checked
                                                       @if(isset($emps))@if($emps->employee->offer_acceptance == '1')checked @endif @endif>
                                                <span class="radio"></span>Completed</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="offer_acceptance"
                                                       id="offer_acceptance"
                                                       @if(isset($emps))@if($emps->employee->offer_acceptance == '0')checked @endif @endif>
                                                <span class="radio"></span>Pending</label>
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Probation Period </h6></label>

                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                            <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                <option value="">Select probation period</option>
                                                    @if($emps->employee->probation_period == '0')
                                                        <option value="0" selected>0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other">Other</option>
                                                    @elseif($emps->employee->probation_period == '90')
                                                        <option value="0">0 days</option>
                                                        <option value="90" selected>90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other">Other</option>
                                                    @elseif($emps->employee->probation_period == '180')
                                                        <option value="0">0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180" selected>180 days</option>
                                                        <option value="Other">Other</option>
                                                     @else
                                                        <option value="0">0 days</option>
                                                        <option value="90">90 days</option>
                                                        <option value="180">180 days</option>
                                                        <option value="Other" selected>Other</option>

                                                    @endif
                                            </select>
                                                    <input type="text" class="form-control probation_text hidden" id="probation_text" value={{$emps->employee->probation_period}}>
                                                @else
                                                    <select class="select2-single form-control probation_select" name="prob_period" id="probation_period" >
                                                    <option value="">Select probation period</option>
                                                    <option value="0">0 days</option>
                                                    <option value="90">90 days</option>
                                                    <option value="180">180 days</option>
                                                    <option value="Other">Other</option>
                                                    </select>
                                            <input type="text" class="form-control probation_text hidden" id="probation_text">
                                                @endif


                                    </div>
                                    </div>
                                    <div class="panel panel-default col-sm-4">


                                    <div class="section">
                                        <label for="datepicker5" class="field prepend-icon mb5"><h6 class="mb20 mt40">
                                                Date of Confirmation </h6></label>

                                        <div class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"
                                                       value="@if($emps && $emps->employee->date_of_confirmation){{$emps->employee->date_of_confirmation}}@endif"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @else
                                                <input type="text" id="datepicker5" class="gui-input fs13" name="doc"/>
                                                <label class="field-icon">
                                                    <i class="fa fa-calendar"></i>
                                                </label>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Department </h6></label>
                                            <select class="select2-single form-control" name="department" id="department">
                                                <option value="">Select department</option>
                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                    @if($emps->employee->department == 'Software Engineering')
                                                        <option value="Software Engineering" selected>Software Engineering</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="IT">IT</option>
                                                    @elseif($emps->employee->department == 'Sales')
                                                        <option value="Software Engineering">Software Engineering</option>
                                                        <option value="Sales" selected>Sales</option>
                                                        <option value="IT">IT</option>
                                                    @else
                                                        <option value="Software Engineering">Software Engineering</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="IT" selected>IT</option>
                                                    @endif
                                                @else
                                                    <option value="Software Engineering">Software Engineering</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="IT">IT</option>
                                                @endif
                                            </select>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Salary on Confirmation </h6>
                                        </label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="salary" id="salary" class="gui-input"
                                                       value="@if($emps && $emps->employee->salary){{$emps->employee->salary}}@endif" readonly>
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="e.g 10000" name="salary"
                                                       id="salary" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-inr"></i>
                                                </label>
                                            @endif
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
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="account_number" id="bank_account_number"
                                                       class="gui-input"
                                                       value="@if($emps && $emps->employee->account_number){{$emps->employee->account_number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="Bank account number"
                                                       name="account_number" id="bank_account_number" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> Bank Name </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="bank_name" id="bank_name" class="gui-input"
                                                       value="@if($emps && $emps->employee->bank_name){{$emps->employee->bank_name}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="name of bank..." name="bank_name"
                                                       id="bank_name" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-columns"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> IFSC Code </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="ifsc_code" id="ifsc_code" class="gui-input"
                                                       value="@if($emps && $emps->employee->ifsc_code){{$emps->employee->ifsc_code}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="ifsc code..." name="ifsc_code"
                                                       id="ifsc_code" class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-font"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PF Account Number </h6></label>
                                        <label for="input002" class="field prepend-icon">
                                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                                <input type="text" name="pf_account_number" id="pf_account_number"
                                                       class="gui-input"
                                                       value="@if($emps && $emps->employee->pf_account_number){{$emps->employee->pf_account_number}}@endif">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @else
                                                <input type="text" placeholder="PF account number..."
                                                       name="pf_account_number" id="pf_account_number"
                                                       class="gui-input">
                                                <label for="input002" class="field-icon">
                                                    <i class="fa fa-list"></i>
                                                </label>
                                            @endif
                                        </label>
                                    </div>

                                   <div class="section">
                                       <label for="input002"><h6 class="mb20 mt40"> UAN Number</h6></label>
                                       <label for="input002" class="field prepend-icon">
                                           @if(\Route::getFacadeRoot()->current()->uri() == 'edit-emp/{id}')
                                              <input type="text" name="un_number" id="un_number" class="gui-input"
                                              value="@if($emps && $emps->employee->un_number){{$emps->employee->un_number}}@endif">
                                               <label for="input002" class="field-icon">
                                                   <i class="fa fa-list"></i>
                                               </label>
                                           @else
                                             <input type="text" placeholder="UN Number" name="un_number" id="un_number" class="gui-input">
                                              <label for="input002" class="field-icon">
                                                  <i class="fa fa-list"></i>
                                              </label>
                                           @endif
                                       </label>
                                   </div>


                                    <div class="section">
                                        <label for="input002"><h6 class="mb20 mt40"> PF Status </h6></label>

                                        <div class="option-group field">
                                            <label class="field option mb5">
                                                <input type="radio" value="1" name="pf_status" id="pf_status"
                                                       @if(isset($emps))@if($emps->employee->pf_status == '1')checked @endif @endif>
                                                <span class="radio"></span>Active</label>
                                            <label class="field option mb5">
                                                <input type="radio" value="0" name="pf_status" id="pf_status" checked
                                                       @if(isset($emps))@if($emps->employee->pf_status == '0')checked @endif @endif>
                                                <span class="radio"></span>Inactive</label>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <div class="col-sm-12">
                                    <div class="section">
                                        <div>

                                                <input type="hidden" value="{{!! csrf_token() !!}}" id="token">
                                                <input type="submit" value="Save" class="form-control btn btn-bordered btn-info btn-block">


                                        </div>
                                    </div>
                                  
                            </div>
                            <!-- -------------- /Wizard -------------- -->

                        </form>
                        <!-- -------------- /Form -------------- -->
                        {!! Form::close() !!}
                    </div>
                    <!-- -------------- /Spec Form -------------- -->

            </div>
@endsection
@push('scripts')
   <script src="/assets/js/custom.js"></script>

@endpush