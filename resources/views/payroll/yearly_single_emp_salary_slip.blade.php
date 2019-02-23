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
                            <div class="table-responsive">
                            <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Month</th>
                                        <th class="text-center">Salary Slip PDF</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">January</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/January/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_January_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">February</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/February/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_February_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">March</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/March/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_March_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">April</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/April/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_April_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">May</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/May/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_May_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">June</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/June/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_June_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">July</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/July/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_July_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">August</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/August/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_August_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">September</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/September/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_September_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">October</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/October/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_October_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">November</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/November/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_November_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">{{$id}}</td>
                                            <td class="text-center">{{$year_id}}</td>
                                            <td class="text-center">December</td>
                                            <td class="text-center">
                                            <button type="button" 
                                            data-value="/Payment_Slip/{{$year_id}}/December/{{$id}}. {{Auth::user()->name}}/{{$id}}_{{Auth::user()->name}}_December_{{$year_id}}.pdf"><i class="fa fa-file-pdf-o" style="font-size:28px;color:red"></i></button></td>
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
@push('scripts')

<script>
$(document).ready(function() {
  $('button').on('click', function() {
    var oldUrl = $(this).data('value');
        $.ajax({
            url: window.location.origin+oldUrl,
            type:'HEAD',
            error: function()
            {
                //file not exists
                alert('Your Payment Slip Not Generated');
                alert(oldUrl);
                
            },
            success: function()
            {
                //file exists
                //alert('file exists');
                //alert(oldUrl);
                window.open(window.location.origin+oldUrl);
            }
    });
  });
});
</script>
@endpush