@extends('layouts.base')

@section('content')

    <section id="content" class="animated fadeIn">
    @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                    </div>
                            @endif 
        <div class="row">

            <div class="col-md-5">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading text-center">
                            <span class="panel-title">{{isset($details->name)?$details->name:''}}</span>
                        </div>

                        <p class="text-center no-margin">{{isset($details->userrole->role->name)?$details->userrole->role->name:''}}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Department:</span> {{isset($details->department) ? $details->department:'' }}</p>
                        <p class="small text-center no-margin"><span class="text-muted">Employee ID:</span> {{isset($details->code) ? $details->code:''}}</p>


                    </div>
                </div>
               
                {{ Form::open(array('url' => 'update-emp-bankdetail')) }}
                <div class="box box-success">
                <input type="hidden" name="employee_id" value="{{$details->id}}">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Bank Details</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Account Number</strong></td>
                                        <td>
                                        <input class="form-control" type="number" name="account_number" value="{{isset($details->account_number) ? $details->account_number:''}}">
                                        </td>

                                    </tr>
                                    <tr>

                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>Pf Account Number</strong></td>
                                        <td><input class="form-control" type="number" name="pf_account_number" value="{{isset($details->pf_account_number) ? $details->pf_account_number:''}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-bank"></i></td>
                                        <td><strong>Bank Name</strong></td>
                                        <td><input class="form-control" type="text" name="bank_name" value="{{isset($details->bank_name) ? $details->bank_name: ''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-code"></i></td>
                                        <td><strong>Ifsc Code</strong></td>
                                        <td><input class="form-control" type="text" name="ifsc_code" value="{{isset($details->ifsc_code) ? $details->ifsc_code: ''}}"> </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-tags"></i></td>
                                        <td><strong>Un Number</strong></td>
                                        <td><input class="form-control" type="text" name="un_number" value="{{isset($details->un_number) ? $details->un_number:''}}"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                        <input class="btn btn-info" type="submit" value="Update Bank Details">
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">

                        <div class="panel-heading">
                            <span class="panel-title">Personal Details</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            {{ Form::open(array('url' => 'update-emp-personal-detail')) }}
                            <div class="box-body no-padding">
                            <input type="hidden" name="employee_id" value="{{$details->id}}">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-birthday-cake"></i>
                                        </td>
                                        <td><strong>Birthday</strong></td>
                                        <td><input class="form-control" type="date" name="date_of_birth" value="{{isset($details->date_of_birth) ? $details->date_of_birth:'' }}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-genderless"></i>
                                        </td>
                                        <td><strong>Gender</strong></td>
                                        <td><input class="form-control" type="text" name="gender" value="{{getGender($details->gender)}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-envelope-o"></i>
                                        </td>
                                        <td><strong>Father's Name</strong></td>
                                        <td><input class="form-control" type="text" name="father_name" value="{{isset($details->father_name)? $details->father_name:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Cellphone</strong></td>
                                        <td><input class="form-control" type="number" name="number" value="{{isset($details->number)? $details->number:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Emergency No</strong></td>
                                        <td><input class="form-control" type="number" name="emergency_number" value="{{isset($details->emer_number)? $details->number:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-mobile-phone"></i>
                                        </td>
                                        <td><strong>Pan No</strong></td>
                                        <td><input class="form-control" type="number" name="pan_number" value="{{isset($details->pan_number)? $details->number:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Qualification</strong></td>
                                        <td><input class="form-control" type="text" name="qualification" value="{{isset($details->qualification) ? $details->qualification:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Current Address</strong></td>
                                        <td><input class="form-control" type="text" name="current_address" value="{{isset($details->current_address)? $details->current_address:''}}"></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-map-marker"></i>
                                        </td>
                                        <td><strong>Permanent Address</strong></td>
                                        <td><input class="form-control" type="text" name="permanent_address" value="{{isset($details->permanent_address) ? $details->permanent_address:''}}"></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <input class="btn btn-info" type="submit" value="Update Personal Details">
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>




            <div class="col-md-6">
                <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title">Employment Details</span>
                        </div>
                        <div class="panel-body pn pb5">
                            <hr class="short br-lighter">

                            <div class="box-body no-padding">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td style="width: 10px" class="text-center"><i class="fa fa-key"></i></td>
                                        <td><strong>Employee ID</strong></td>
                                        <td>{{$details->code}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-briefcase"></i></td>
                                        <td><strong>Department</strong></td>
                                        <td>{{$details->department}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-cubes"></i></td>
                                        <td><strong>Designation</strong></td>
                                        <td>{{$role->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Joined</strong></td>
                                        <td>{{$details->date_of_joining}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-calendar"></i></td>
                                        <td><strong>Date Confirmed</strong></td>
                                        <td>{{$details->date_of_confirmation}}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><i class="fa fa-credit-card"></i></td>
                                        <td><strong>Salary</strong></td>
                                        <td>{{$details->salary}}</td>
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

        </div>
     
    </section>

@endsection
<script type="text/javascript">

</script>
