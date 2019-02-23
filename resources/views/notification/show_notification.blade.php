@extends('layouts.base')

@section('content')
<!-- START CONTENT -->
<div class="content">




    <!-- -------------- Content -------------- -->
    <section id="content" class="table-layout animated fadeIn">

        <!-- -------------- Column Center -------------- -->
        <div class="chute chute-center">

            <!-- -------------- Products Status Table -------------- -->
            <div class="row ">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> Notification Lists </span>
                            </div>
                            <div class="panel-body pn">
                                @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('flash_message') }}
                                </div>
                                @endif
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                <div class="table-responsive">
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    
                                        <tbody>
                                            <?php $i =0;?>


                                            @foreach($notifications as $notification)
                                            <table class="table table-bordered nobodytable" tabindex="0">
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%">Date & Time</th>
                                                        <td style="width:80%">{{$notification->date_time}}</td>
                                                        @if(\Auth::user()->isAdmin || \Auth::user()->isHR() ||
                                                        \Auth::user()->isManager())
                                                        <td class="text-center" style="width:10%">
                                                            <div class="btn-group text-right">
                                                                <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle"
                                                                    data-toggle="dropdown" aria-expanded="false">
                                                                    Action
                                                                    <span class="caret ml5"></span>
                                                                </button>
                                                                <ul class="dropdown-menu" notification="menu">
                                                                    <li>
                                                                        <a href="/edit-notification/{{$notification->id}}">Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/delete-notification/{{$notification->id}}">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%">Title</th>
                                                        <td style="width:80%">{{$notification->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color:#e0e0e0; width:15%"> Details </th>
                                                        <td style="background-color:#edf3ff; font-size: 14px; width:80%"><b>{{$notification->details}}</b></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br>

                                          
                                            @endforeach
                                            <tr>
                                                {!! $notifications->render() !!}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
