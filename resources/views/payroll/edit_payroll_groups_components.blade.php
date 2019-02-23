@extends('layouts.base')

@section('content')
<!-- START CONTENT -->
<div class="content">


    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> Edit Payroll Componants</span>
                            </div>

                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <div class="panel-body p25 pb10">
                                        @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{Session::get('flash_message')}}
                                        </div>
                                        @endif
                                        <form action="/editsave-payroll-group-components/{{$payroll_groupscomponant->id}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="group_id" id="input002" class=" form-control"
                                                        value="{{$payroll_groupscomponant->group_id}}">

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Name  </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="group_name" id="input002" class=" form-control"
                                                        value="{{$payroll_groupscomponant->name}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Type</label>
                                                <div class="col-md-6">
                                                    <select name="group_description_type" class=" form-control">
                                                        <option value="1" {{ $payroll_groupscomponant->type == '1' ? 'selected' : ''}} >Earning</option>
                                                        <option value="2" {{ $payroll_groupscomponant->type == '2' ? 'selected' : ''}}>Deduction</option>
                                                    </select> 
                                                </div>
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Formula</label>
                                                <div class="col-md-6">
                                                    <textarea  type="text" name="group_description" id="input002" class=" form-control"
                                                        value=""
                                                        required> {{$payroll_groupscomponant->formula}} </textarea >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Value  </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="formula_value" id="input002" class=" form-control"
                                                    value="{{$payroll_groupscomponant->formula_value}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label">Formula Type</label>
                                                <div class="col-md-6">
                                                    <select name="formula_type" class=" form-control">
                                                        <option value="1" {{ $payroll_groupscomponant->formula_type == '1' ? 'selected' : ''}}>Percentage</option>
                                                        <option value="2" {{ $payroll_groupscomponant->formula_type == '2' ? 'selected' : ''}}>Value</option>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Default Selected</label>
                                                <div class="col-md-6">
                                                    <select name="is_selected" class=" form-control">
                                                        <option value="1" {{ $payroll_groupscomponant->is_selected == '1' ? 'selected' : ''}} >Yes</option>
                                                        <option value="2" {{ $payroll_groupscomponant->is_selected == '2' ? 'selected' : ''}}>No</option>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 control-label"></label>
                                                <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block"
                                                        value="Submit">

                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection
