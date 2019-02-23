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
                            <span class="panel-title hidden-xs">Select Componant To Create Employee Salary Slip</span><br />
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
                            <form action="/salary_slip_DownloadPDF/{{request()->route('id')}}" method="POST" target="_blank">
                            {{ csrf_field() }}

                                <span>
                                    <label class="form-control" >Select Month & Year:</label>

                                    <select class="form-control" id="month" name="month">
                                        <option value="1" >January</option>
                                        <option value="2" >February</option>
                                        <option value="3" >March</option>
                                        <option value="4" >April</option>
                                        <option value="5" >May</option>
                                        <option value="6" >June</option>
                                        <option value="7" >July</option>
                                        <option value="8" >August</option>
                                        <option value="9" >September</option>
                                        <option value="10" >October</option>
                                        <option value="11" >November</option>
                                        <option value="12" >December</option>
                                    </select>
                                    &nbsp;
                                    <select class="form-control" id="year_id" name="year_id">
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select>

                                </span>
                                <br/>

                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-left">Select Componant</th>
                                        <th class="text-left">Type</th>
                                        <th class="text-left">Formula</th>
                                        <th class="text-left">Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =0;?>
                                    @foreach($payroll_group_components as $payroll_group_component)
                                    <tr>
                                        

                                       <td class="text-left"><input type="checkbox" id="inlineCheckbox1" name="my_componants[]" value="{{$payroll_group_component->id}}" {{ $payroll_group_component->is_selected == '1' ? 'checked' : ''}}>{{$payroll_group_component->name}}</td>
                                       
                                       @if($payroll_group_component->type == 1)
                                            <td class="text-left">Earning</td>
                                            @else
                                            <td class="text-left">Deductation</td>
                                        @endif

                                       <td class="text-left">{{$payroll_group_component->formula}}</td>
                                       <td class="text-left">{{$payroll_group_component->formula_value}}</td>
                                        
                                    </tr>
                                    @endforeach
                                    <tr>
                                    </tr>
                                    
                                    </tbody>
                                    
                                </table>
                                <input type="submit" class="btn btn-bordered btn-info btn-block" value="Generate Salary Slip">
                                
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

@push('scripts')

<script>
$( document ).ready(function(){
    var d = new Date();
    var n = d.getMonth();
    var y = d.getFullYear();
   
    $('#month option:eq('+n+')').prop('selected', true);

    $('#year_id option[value="'+y+'"]').prop('selected', true);
});
</script>
@endpush