@extends('layouts.base')

@section('content')
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
                        @if(Session::has('failed'))
                            <div class="alert alert-danger">
                                {{ Session::get('failed') }}
                            </div>
                        @endif
                        

                        <div class="panel-body pn">
                            @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                    </div>
                            @endif
                            <div class="">
                                <form action="/salary_slip_single_emp_DownloadPDF/{{Auth::user()->id}}" method="POST">
                                {{ csrf_field() }}

                                <select class="form-control" name="year_id" >
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                </select>
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <br/>
                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="View Salary Slip">
                                    
                                </form>
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
