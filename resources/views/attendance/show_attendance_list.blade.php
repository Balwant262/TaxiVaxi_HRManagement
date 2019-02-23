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
                                <span class="panel-title hidden-xs"> Attendance List for user: </span><br />
                            </div><br />
                            <div class="panel-body pn">
                                @if(Session::has('flash_message'))
                                    <div class="alert alert-success">
                                        {{ Session::get('flash_message') }}
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                    @if(count($attendances))
                                      <thead>
                                        <tr class="bg-light">
                                            <th class="text-center">Clock In Time</th>
                                            <th class="text-center">Clock Out Time</th>
                                            <th class="text-center">Day Status (Full\Half day)</th>
                                        </tr>
                                        </thead>
                                        @else
                                            <h2>Nothing to show</h2>
                                        @endif
                                        <tbody>
                                          @foreach($attendances as $attendance)
                                            <tr>
                                                <td class="text-center">{{$attendance->clock_in}}</td>
                                                <td class="text-center">{{$attendance->clock_out}}</td>
                                                <td class="text-center">{{$attendance->day_status}}</td>
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

    </div>
@endsection
@push('scripts')
    <script src="/assets/js/custom.js"></script>
@endpush
