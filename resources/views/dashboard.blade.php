@extends('layouts.base')

@section('content')

        <!-- -------------- Topbar -------------- -->
<div class="panel panel-info ">
      <div class="panel-heading">
      <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
      @foreach($goodthoughts as $goodthought)
      <ul style="display: inline;">
        <li style="display: inline;"> 
            <h5 style="display: inline; color: white;">
            &#xe124; &nbsp;&nbsp; {{$goodthought->details}} &nbsp;&nbsp; &#xe124;
            </h5>
        </li>
      </ul>
      
      @endforeach
      </marquee></div>
</div>

<!-- -------------- /Topbar -------------- -->

<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- -------------- Column Center -------------- -->
    <div class="chute chute-center">

        <!-- -------------- Quick Links -------------- -->
        <div class="row">

        <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10">
                                <img src="/assets/img/pages/notification01.png" class="img-responsive mauto" alt="" />
                                </div>
                                @if($notifications->count())
                                    <img src="/assets/img/pages/new.gif" class="img-responsive mauto" alt="" height="100" width="50"/>                                  
                                @endif
                            <div class="col-xs-7 pl5">
                                <h4 class="text-muted"><a href="{{route('notification-list')}}">SHOW NOTIFICATION</a></h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10">
                                <img src="/assets/img/pages/clipart01.png" class="img-responsive mauto" alt="" />
                            </div>
                            @if($announcements->count())
                                    <img src="/assets/img/pages/new.gif" class="img-responsive mauto" alt="" height="100" width="50"/>                                  
                            @endif
                            <div class="col-xs-7 pl5">
                                <h5  class="text-muted"><a href="{{route('announcement-list')}}">SHOW ANNOUNCMENT</a></h5>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            


            <div class="col-sm-4 col-xl-3">
                <div class="panel panel-tile">
                    <div class="panel-body">
                        <div class="row pv10">
                            <div class="col-xs-5 ph10">
                                <img src="/assets/img/pages/good.png" class="img-responsive mauto" alt="" /></div>
                            <div class="col-xs-7 pl5">
                                <h4 class="text-muted"><a href="{{route('goodthoughts-list')}}"> GOOD THOUGHTS </a></h4>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            
             </div>


           </div>
         </section>
    @endsection
