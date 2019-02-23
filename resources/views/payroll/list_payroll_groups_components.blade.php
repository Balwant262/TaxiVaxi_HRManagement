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
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Formula</th>
                                        <th class="text-center">Value</th>
                                        <th class="text-center">Formula Type</th>
                                        <th class="text-center">Defulat Selected</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    @foreach($payroll_group_components as $payroll_group_component)
                                    <tr>
                                        <td class="text-center">{{$i+=1}}</td>
                                        <td class="text-center">{{$payroll_group_component->name}}</td>

                                        @if($payroll_group_component->type == 1)
                                         <td>Earning</td>
                                        @else
                                        <td>Deductation</td>
                                        @endif

                                        <td class="text-center">{{$payroll_group_component->formula}}</td>
                                        <td class="text-center">{{$payroll_group_component->formula_value}}</td>
                                        
                                        @if($payroll_group_component->formula_type == 1)
                                         <td>Percentage</td>
                                        @else
                                        <td>Value</td>
                                        @endif

                                        @if($payroll_group_component->is_selected == 1)
                                         <td>Yes</td>
                                        @else
                                        <td>No</td>
                                        @endif
                                        
                                        <td class="text-center">
                                                    <div class="btn-group text-right">
                                                        <button type="button"
                                                                class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                data-toggle="dropdown" aria-expanded="false"> Action
                                                            <span class="caret ml5"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="/edit-payroll-group-components/{{$payroll_group_component->id}}">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a href="/delete-payroll-group-components/{{$payroll_group_component->id}}">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
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
