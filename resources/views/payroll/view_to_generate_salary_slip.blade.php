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
                            <span class="panel-title hidden-xs">Employee Basic Salary</span><br />
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
                            <div class="table-responsive">
                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Basic salary</th>
                                        <th class="text-center">Generate salary</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    @foreach($emps as $emp)
                                    <tr>
                                    <td class="text-center">{{$emp->id}}</td>
                                        <td class="text-center">{{$emp->name}}</td>
                                        <td class="text-center">{{$emp->department}}</td>
                                        <td class="text-center"><span class="fa fa-rupee"></span> 
                                        @foreach($users as $user)
                                            @if($user->id === $emp->user_id)
                                            {{$emp->salary}}
                                            @endif
                                        @endforeach
                                        </td>
                                        <td class="text-center"><a href="/generate-salary-slip-single-employee/{{$emp->user_id}}"><span class="pull-right btn btn-bordered btn-success">Select Componant</span><br /></a></td>
                                        <!-- <td class="text-center"><a href="/downloadPDF/{{$emp->user_id}}" target="_blank"><span class="pull-right btn btn-bordered btn-success" >Generate</span><br /></a></td> -->
                                    </tr>
                                    @endforeach
                                    <tr>
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
    </section>

</div>
@endsection
