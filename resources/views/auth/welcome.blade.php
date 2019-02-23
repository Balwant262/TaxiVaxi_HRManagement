@extends('layouts.base')

@section('content')
<div class="panel panel-info ">
      <div class="panel-heading">
      <marquee behavior="scroll" direction="left" >
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
<!-- -------------- Content -------------- -->
<section id="content" class="table-layout animated fadeIn">

    <!-- -------------- Column Center -------------- -->
    <div class="chute chute-center">

        <!-- -------------- Quick Links -------------- -->
        <div class="row">

       
            <img src="/assets/img/taxivaxi img1.png" alt="" class="img-responsive mauto"/>
           
        </div>

        <div>
                <div class="col-sm-6 col-xl-3">
                    <h5 class="mt40 mb20"><a href="/dashboard"><i class="fa fa-arrow-circle-o-left"> Dashboard </i></a></h5>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <h5 class="mt40 mb20"><a href="/profile"> Profile <i class="fa fa-arrow-circle-o-right"> </i></a></h5>
                </div>
            </div>
    </div>
</section>

@endsection
