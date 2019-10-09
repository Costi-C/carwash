@extends('admin_template')

@section('content')

<h3>Evidenta</h3>    
        <div class="row">
            <div class="col-lg-3 col-xs-6 col-md-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$vehicles}}</h3>
                        <p>Autovehicule</p>
                    </div>
                    <div class="icon">
                        <i style="color: #ffffff;" class="ion ion-model-s"></i>
                    </div>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6 col-md-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$employees}}</h3>
                        <p>Angajati</p>
                    </div>
                    <div class="icon">
                        <i style="color: #ffffff;" class="ion-person-stalker"></i>
                    </div>
                </div>
            </div><!-- ./col -->         
        </div><!-- /.row -->

<h3>Venituri {{$date}}</h3>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$total->total}}<sup style="font-size: 20px">LEI</sup></h3>
                        <p>Venit masini</p>
                    </div>
                    <div class="icon">
                        <i class="ion-social-usd" style="color: white;"></i>
                    </div>            
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>@foreach($venit as $v)
                            {{$v}}
                        @endforeach<sup style="font-size: 20px">LEI</sup>
                        </h3>
                        <p>Venit Bar</p>
                    </div>
                    <div class="icon">
                        <i class="ion-social-usd" style="color: white;"></i>
                    </div>            
                </div>
            </div>
        </div>

@endsection