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
<?php ($count = '0'); ?>
<h5 style="left:100%;"><b>Payslip : </b>
<?php $__currentLoopData = $payslip_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payslip_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($count==='0'): ?>
    <?php if($payslip_data->month_id == "1"): ?>
        January
    <?php endif; ?>
    <?php if($payslip_data->month_id == "2"): ?>
        February
    <?php endif; ?>
    <?php if($payslip_data->month_id =="3"): ?>
        March
    <?php endif; ?>
    <?php if($payslip_data->month_id == "4"): ?>
        April
    <?php endif; ?>
    <?php if($payslip_data->month_id == "5"): ?>
        May
    <?php endif; ?>
    <?php if($payslip_data->month_id == "6"): ?>
        June
    <?php endif; ?>
    <?php if($payslip_data->month_id == "7"): ?>
        July
    <?php endif; ?>
    <?php if($payslip_data->month_id == "8"): ?>
        August
    <?php endif; ?>
    <?php if($payslip_data->month_id == "9"): ?>
        September
    <?php endif; ?>
    <?php if($payslip_data->month_id == "10"): ?>
        October
    <?php endif; ?>
    <?php if($payslip_data->month_id == "11"): ?>
        November
    <?php endif; ?>
    <?php if($payslip_data->month_id == "12"): ?>
        December
    <?php endif; ?>
    &nbsp; <?php echo e($payslip_data->year_id); ?>

<?php endif; ?>
<?php ($count = '1'); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <td>
        <h5><?php echo e($user->name); ?></h5>
        <h5><?php echo e($user->code); ?></h5>
        <h5><?php echo e($user->pan_number); ?></h5>
        <h5><?php echo e($user->department); ?></h5>
        <h5><?php echo e($user->qualification); ?></h5>
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
        <h5><?php echo e($user->date_of_joining); ?></h5>
        <h5><?php echo e($user->account_number); ?></h5>
        <h5>-</h5>
        <h5>0.0</h5>
        <h5>0.0</h5>
        </td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php ($total_earning = 0); ?>
<?php ($total_deducation = 0); ?>
<table class="table table-striped" >
    <tbody>
        <tr style="background-color:#f2f6fc;">
            <td>

                <div style="clear:both; position:relative;">
                    <div style="position:absolute; left:0pt; width:50%;">
                    
                        <?php $__currentLoopData = $payroll_group_components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll_group_component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($payroll_group_component->type === 1): ?>
                                <?php $__currentLoopData = $payslip_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payslip_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($payslip_data->componant_id === $payroll_group_component->id): ?>
                                    <div style="clear:both; position:relative;">
                                        <div style="position:absolute; left:0pt; width:25%;">
                                            <h5><b><?php echo e($payroll_group_component->name); ?></b></h5>
                                        </div>
                                        <div style="margin-left:50%;">
                                        <h5><?php echo e($payslip_data->componant_value); ?></h5>
                                        <?php $total_earning = $total_earning + $payslip_data->componant_value; ?>
                                        </div>
                                    </div>
                                    
                                    <?php endif; ?>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                    

                    <div style="margin-left:50%;">
                        <?php $__currentLoopData = $payroll_group_components; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payroll_group_component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($payroll_group_component->type === 2): ?>
                                <?php $__currentLoopData = $payslip_datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payslip_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($payslip_data->componant_id === $payroll_group_component->id): ?>
                                    <div style="clear:both; position:relative;">
                                        <div style="position:absolute; left:0pt; width:40%; ">
                                        <h5> <b><?php echo e($payroll_group_component->name); ?></b></h5>
                                        </div>
                                        <div style="margin-left:70%;">
                                        <h5><?php echo e($payslip_data->componant_value); ?></h5>
                                        <?php $total_deducation = $total_deducation + $payslip_data->componant_value; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
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
                    <h5><b>Total Earnings :</b><?php echo e($total_earning); ?></h5>
                    </div>
                    <div style="margin-left:50%;">
                    <h5><b>Total Deductions :</b> <?php echo e($total_deducation); ?></h5>
                    </div>
                </div>
            </td>
        </tr>
    </tbody>
</table>




<?php $ConvertNumberToWord = app('App\CustomClass\ConvertNumberToWord'); ?>
<h5> <b>Net Salary: </b><?php echo e($total_earning - $total_deducation); ?></h5>
<h5> <b>Net Salary (in words): </b> <?php echo e($ConvertNumberToWord->convertNumberToWord($total_earning - $total_deducation)); ?> Only</h5>
</body>
</html>