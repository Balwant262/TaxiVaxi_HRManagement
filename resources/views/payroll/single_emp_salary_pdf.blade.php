<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Salay Slip</title>
    
    <link type="text/css" media="all"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

<style type="text/css" media="all"  >

</style>
</head>
<body>

<table class="table table-striped">
    <tbody>
        <tr style="background-color:#cfdff9;">
            <td>
                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:20%;">

                    </div>
                    <div style="margin-left:40%;">
                    <h4><b>BAI INFOSOLUTIONS PRIVATE LIMITED</b> </h4>
                    <h5>vinod@taxivaxi.com</h5>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@php ($count = '0')
<h5 style="left:100%;"><b>Payslip : </b>
@foreach($payslip_datas as $payslip_data)
@if($count==='0')
    @if($payslip_data->month_id == "1")
        January
    @endif
    @if($payslip_data->month_id == "2")
        February
    @endif
    @if($payslip_data->month_id =="3")
        March
    @endif
    @if($payslip_data->month_id == "4")
        April
    @endif
    @if($payslip_data->month_id == "5")
        May
    @endif
    @if($payslip_data->month_id == "6")
        June
    @endif
    @if($payslip_data->month_id == "7")
        July
    @endif
    @if($payslip_data->month_id == "8")
        August
    @endif
    @if($payslip_data->month_id == "9")
        September
    @endif
    @if($payslip_data->month_id == "10")
        October
    @endif
    @if($payslip_data->month_id == "11")
        November
    @endif
    @if($payslip_data->month_id == "12")
        December
    @endif
    &nbsp; {{$payslip_data->year_id}}
@endif
@php ($count = '1')
@endforeach
</h5>

<table class="table table-striped">
    <tbody>
    <tr style="background-color:#f2f6fc;">
        <td>
        <h5><b>Name:</b></h5>
        <h5><b>Employee ID:</b></h5>
        <h5><b>PAN Number:</b></h5>
        <h5><b>Department:</b></h5>
        <h5><b>Designation:</b></h5>
        </td>
        @foreach($users as $user)
        <td>
        <h5>{{$user->name}}</h5>
        <h5>{{$user->code}}</h5>
        <h5>{{$user->pan_number}}</h5>
        <h5>{{$user->department}}</h5>
        <h5>{{$user->qualification}}</h5>
        </td>
        
        <td>
        <h5><b>Payslip #:</b></h5>
        <h5><b>Joining Date:</b></h5>
        <h5><b>Bank Account:</b></h5>
        <h5><b>Pay Date:</b></h5>
        <h5><b>Unpaid Leaves:</b>
        <h5><b>Overtime Days</b></h5>
        </td>
        
        <td>
        <h5>4120</h5>
        <h5>{{$user->date_of_joining}}</h5>
        <h5>{{$user->account_number}}</h5>
        <h5>-</h5>
        <h5>0.0</h5>
        <h5>0.0</h5>
        </td>
        @endforeach
    </tr>
    </tbody>
</table>

<table class="table table-striped" >
    <tbody>
        <tr style="background-color:#f2f6fc;">
            <td>
                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:50%;">
                    <h4><b>Earnings</b></h4>
                    </div>
                    <div style="margin-left:50%;">
                    <h4><b>Deductions</b></h4>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>
@php ($total_earning = 0)
@php ($total_deducation = 0)
<table class="table table-striped" >
    <tbody>
        <tr style="background-color:#f2f6fc;">
            <td>

                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:50%;">
                    
                        @foreach($payroll_group_components as $payroll_group_component)
                            @if($payroll_group_component->type === 1)
                                @foreach($payslip_datas as $payslip_data)
                                    @if($payslip_data->componant_id === $payroll_group_component->id)
                                    <div style="clear:both; position:relative;">
                                        <div style="position:absolute; left:0pt; width:25%;">
                                            <h5><b>{{$payroll_group_component->name}}</b></h5>
                                        </div>
                                        <div style="margin-left:50%;">
                                        <h5>{{$payslip_data->componant_value}}</h5>
                                        <?php $total_earning = $total_earning + $payslip_data->componant_value; ?>
                                        </div>
                                    </div>
                                    
                                    @endif
                                    
                                @endforeach
                            
                            @endif
                            
                        @endforeach
                        
                    </div>
                    

                    <div style="margin-left:50%;">
                        @foreach($payroll_group_components as $payroll_group_component)
                            @if($payroll_group_component->type === 2)
                                @foreach($payslip_datas as $payslip_data)
                                    @if($payslip_data->componant_id === $payroll_group_component->id)
                                    <div style="clear:both; position:relative;">
                                        <div style="position:absolute; left:0pt; width:40%; ">
                                        <h5> <b>{{$payroll_group_component->name}}</b></h5>
                                        </div>
                                        <div style="margin-left:70%;">
                                        <h5>{{$payslip_data->componant_value}}</h5>
                                        <?php $total_deducation = $total_deducation + $payslip_data->componant_value; ?>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach

                            @endif
                            
                        @endforeach
                        
                    </div>
                    
                </div> 

</td>
        </tr>
    </tbody>
</table>

<table class="table table-striped" >
    <tbody>
        <tr style="background-color:#dbe8f9;">
            <td>
                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:50%;">
                    <h5><b>Total Earnings :</b>{{$total_earning}}</h5>
                    </div>
                    <div style="margin-left:50%;">
                    <h5><b>Total Deductions :</b> {{$total_deducation}}</h5>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>




@inject('ConvertNumberToWord', 'App\CustomClass\ConvertNumberToWord')
<h5> <b>Net Salary: </b>{{$total_earning - $total_deducation}}</h5>
<h5> <b>Net Salary (in words): </b> {{$ConvertNumberToWord->convertNumberToWord($total_earning - $total_deducation)}} Only</h5>
</body>
</html>