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
                                <span class="panel-title hidden-xs"> Add New Payroll Componants Group </span>
                            </div>

                            <div class="panel-body pn">
                                <div class="table-responsive">
                                    <div class="panel-body p25 pb10">
                                        @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{Session::get('flash_message')}}
                                        </div>
                                        @endif
                                        <form action="/save-new-payroll-group-components/{{request()->route('id')}}" method="POST">
                                        {{ csrf_field() }}
                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Name  </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="group_description_name" id="input002" class=" form-control"
                                                         required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Type</label>
                                                <div class="col-md-6">
                                                    <select name="group_description_type" class=" form-control">
                                                        <option value="1">Earning</option>
                                                        <option value="2">Deduction</option>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Formula</label>
                                                <div class="col-md-6">
                                                    <textarea  type="text" name="group_description_formula" id="input002" class=" form-control"
                                                        value=""
                                                        required> </textarea >
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Value  </label>
                                                <div class="col-md-6">
                                                    <input type="text" name="formula_value" id="input002" class=" form-control"
                                                         required>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label">Formula Type</label>
                                                <div class="col-md-6">
                                                    <select name="formula_type" class=" form-control">
                                                        <option value="1">Percentage</option>
                                                        <option value="2">Value</option>
                                                    </select> 
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="col-md-3 control-label"> Default Selected</label>
                                                <div class="col-md-6">
                                                    <select name="is_selected" class=" form-control">
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
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
