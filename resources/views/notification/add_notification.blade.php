@extends('layouts.base')

@section('content')
        <!-- START CONTENT -->
<div class="content">

  
    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn" >
        <!-- -------------- Column Center -------------- -->
        <div class="chute-affix" data-spy="affix" data-offset-top="200">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                    <div class="panel">
                        <div class="panel-heading">
                            @if(\Route::getFacadeRoot()->current()->uri() == 'edit-notification/{id}')
                                <span class="panel-title hidden-xs"> Edit Notification </span>
                                @else
                                   <span class="panel-title hidden-xs"> Add Notification </span>
                               @endif
                        </div>

                        <div class="panel-body pn">
                            <div class="table-responsive">
                                <div class="panel-body p25 pb10">
                                    @if(Session::has('flash_message'))
                                        <div class="alert alert-success">
                                            {{Session::get('flash_message')}}
                                        </div>
                                    @endif
                                        {!! Form::open(['class' => 'form-horizontal']) !!}

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Notification </label>
                                            <div class="col-md-6">
                                                @if(\Route::getFacadeRoot()->current()->uri() == 'edit-notification/{id}')
                                                <input type="text" name="name" id="input002" class="select2-single form-control" value="@if($result && $result->name){{$result->name}}@endif" required>
                                                @else
                                                    <input type="text" name="name" id="input002" class="select2-single form-control" placeholder="Notification" required>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Description </label>
                                            <div class="col-md-6">

                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-notification/{id}')
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" name="description" required>@if($result && $result->details){{$result->details}}@endif</textarea>
                                                    @else
                                                        <textarea class="select2-single form-control" rows="3" id="textarea1" placeholder="Notification Description" name="description" required></textarea>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"> Date & Time </label>
                                            <div class="col-md-6">

                                                    @if(\Route::getFacadeRoot()->current()->uri() == 'edit-notification/{id}')
                                                    <input id="datetimepicker1" type="text" name="date_time" class="select2-single form-control" value="@if($result && $result->date_time){{$result->date_time}}@endif" required>
                                                    @else
                                                    <input id="datetimepicker1" type="text" name="date_time" class="select2-single form-control" required>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label"></label>
                                            <div class="col-md-2">

                                                    <input type="submit" class="btn btn-bordered btn-info btn-block" value="Submit">
                                           </div>
                                            <div class="col-md-2"><a href="/add-notification" >
                                                    <input type="button" class="btn btn-bordered btn-success btn-block" value="Reset"></a></div>
                                        </div>
                                        {!! Form::close() !!}

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
@push('scripts')
   <script src="/assets/js/custom.js"></script>

@endpush