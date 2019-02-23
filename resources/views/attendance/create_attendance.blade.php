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
                                <span class="panel-title hidden-xs"> Today's Attendance  </span><br />
                            </div><br />
                              @if(session()->has('message'))
                                <div class="alert alert-danger">
                                  {{ session()->get('message') }}
                                </div>
                                @endif
                                <form method="post" action="" id="attendanceform">
                                                              {{ csrf_field() }}
                                    <div class="form-group">
                                      <div class="col-md-2">
                                        <input type="button" id="clock_in" name="clock_in" value="clock_in" class="btn btn-bordered btn-success btn-block">
                                      </div>
                                      <div class="col-md-2">
                                       <input type="button" id="clock_out" name="clock_out" value="clock_out" class="btn btn-bordered btn-success btn-block">

                                      </div>
                                   </div>
                                </form>
                            <div class="panel-body pn">
                            </div>
                        </div>
                    </div>
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            <span class="panel-title hidden-xs"> Today's Attendance Details: </span><br />
                        </div><br />

                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    <thead>
                                    <tr class="bg-light">
                                        <th class="text-center">Clock-In Time:</th>
                                        <th class="text-center">Clock-Out Time:</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inout as $timevar)
                                    <tr>
                                        <td class="text-center">{{$timevar->clock_in}}</td>
                                        <td class="text-center">{{$timevar->clock_out}}</td>
                                    </tr>
                                    @endforeach
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
        <div class="panel-body pn">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif

        </div>
    </div>


@endsection
@push('scripts')
    <script src="/assets/js/custom.js"></script>
    <script language="javascript">

      var submitForm = function(method){

        var formAction = '/mark-attendance_in';
        $('#attendanceform').attr('action', formAction);
        $('#attendanceform').submit();


    };

    var submitForm1 = function(method){

      var formAction = '/mark-attendance_out';
      $('#attendanceform').attr('action', formAction);
      $('#attendanceform').submit();


  };

    $(document)
    .on('click', '#clock_in', function(){

        submitForm('submit');

    })
    .on('click', '#clock_out', function(){

        submitForm1('submit');

    });



    $(document).ready(function(){


     if({{$check}}=='0'){
       $('#clock_in').attr('disabled',false);
       $('#clock_out').attr('disabled',true);
     }
     if({{$check}}=='1'){

       if(({{Auth::user()->attendanceflag}})=='0')
       {
       $('#clock_in').attr('disabled',true);
       $('#clock_out').attr('disabled',false);
       }
       else
       {

       $('#clock_in').attr('disabled',true);
       $('#clock_out').attr('disabled',true);

      }

    }


   });





    </script>
@endpush
