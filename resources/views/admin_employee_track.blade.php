@extends('admin_template')

@section('head')
 <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/bootstrap/datetimepicker/css/datetimepicker.min.css')}}">
 <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/datatables/dataTables.bs.css')}}">
    <style type="text/css">
    .first-row{
        background: #199CDB;
        color: white;
        font-weight: bold;
        font-size: 15px;
    }

    .thead{
        background: #199CDB;
        color: white
    }

    .tbody{
        font-weight: bold;
        font-size: 15px;
        text-transform: uppercase;
    }

    .tdposition{
        line-height: 31px !important;
    }

    .tdbutton{
        font-weight: bold;
        font-size: 13px;
    }

    @media screen and (min-width:768px){
        .example_wrapper .row:nth-child(2){
            width: 0 !important;
            float: right !important;
        }
    }   
    </style>
@endsection

@section('content')
<div class="row">
<div class="col-xs-12 col-md-12">
    <div class="box">
        <div class="box-header">
            <h4> Evidenta angajati
            </h4>
        </div>

        <div class="box-body" style="margin-bottom: 10px;">
            <form class="form-inline">

                <h5>Alege perioada</h5>
               <div class="form-group col-md-4">
                <label>Start:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right date" id="date-start">
                </div>
                <!-- /.input group -->
              </div>
                <div class="form-group col-md-4">
                <label>Sfarsit:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right date" id="date-end">
                </div>
                <!-- /.input group -->
              </div>
                
                <button class="btn btn-primary create-filter" type="button" value="search" name="create-filter" style="margin-bottom: 10px;">Cauta
                </button>

                <button class="btn btn-success remove-filter" type="button" value="search" name="remove-filter" style="margin-bottom: 10px;">Renunta
                </button>
            </form>
        </div>

        <div id="employees-stats" class="col-xs-12 col-md-12">
            @foreach($employees as $employee)                                    
                <div class="col-md-4">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username" style="text-transform: uppercase; font-weight: bold">{{$employee->name}}</h3>
                            <h5 class="widget-user-desc">Angajat</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="{{asset("bower_components/AdminLTE/dist/img/employee.png")}}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header" style="word-wrap: break-word;">       
                                             {{$employee->total}}                              
                                        </h5>                                    
                                        <span class="description-text">LEI</span>
                                    </div>
                                </div>

                                <div class="col-sm-4"></div>

                                <div class="col-sm-4 border-left">
                                    <div class="description-block">
                                        <h5 class="description-header">
                                            {{$employee->orders}}
                                        </h5>
                                        <span class="description-text">MASINI</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            @endforeach    
        </div>

        <div id="default">
            <div class="box-body">                
                <div class="col-md-12" style=" padding: 20px;">
<!--                     <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id angajat</th>
                                <th>Nume</th>
                                <th>Data</th>
                                <th>Vehicule</th>
                                <th>Venituri</th>
                            </tr>
                        </thead>

                        <tbody>
                          @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td data-start=''></td>
                                <td>200</td>
                                <td>30 LEI</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table> -->                
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
</div>
@endsection

@section('javascript')
<script src="{{asset('bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('bower_components/AdminLTE/plugins/datepicker/locales/bootstrap-datepicker.ro.js')}}"></script>
<script src="{{asset('bower_components/AdminLTE/datatables/dataTable.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jsrender.min.js')}}"></script>

<script id="employeesTmpl" type="text/x-jsrender">
    @{{for employees}}
    <div class="col-md-4">
        <div class="box box-widget widget-user">
            <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username" style="text-transform: uppercase; font-weight: bold">@{{:name}}</h3>
                <h5 class="widget-user-desc">Angajat</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle" src="{{asset("bower_components/AdminLTE/dist/img/employee.png")}}" alt="User Avatar">
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header" style="word-wrap: break-word;">       
                                @{{:total}}                              
                            </h5>                                    
                            <span class="description-text">LEI</span>
                        </div>
                    </div>

                    <div class="col-sm-4"></div>

                    <div class="col-sm-4 border-left">
                        <div class="description-block">
                            <h5 class="description-header">
                                @{{:orders}}
                            </h5>
                            <span class="description-text">MASINI
                               
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @{{/for}}
</script>

<script type="text/javascript">
 $(document).ready(function() {
        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            weekStart: 1,
            language: 'ro',
            todayHighlight: true,
            todayBtn: 'linked'
        });

        $('body').on('click', '.create-filter', function(event){
            event.preventDefault();
            var dateStart = '';
            var endDate = '';
            var hasError = false;
            if ($('#date-start').val() == ''){
                hasError = true;
                $.growl.error({ message:"Alegeti o zi!!!"});
            } else{
                dateStart = $('#date-start').val() + ' ' + '00:00:00';                
            }

            if ($('#date-end').val() == ''){
                hasError = true;
                $.growl.error({ message:"Alegeti o zi!!!"});
            } else{
                endDate = $('#date-end').val() + ' ' + '23:59:59';                
            }

            if (!hasError) {
                $.ajax({
                    url: '/admin/employees/track',
                    type: 'POST',                    
                    data: {start: dateStart, end: endDate}
                })
                .done(function(data) {
                    console.log(data);
                    var servicesTmpl = $.templates("#employeesTmpl");
                    var html = servicesTmpl.render({employees: data});
                    $('#employees-stats').empty();
                    $(html).appendTo('#employees-stats');
                })
                .fail(function(){
                    console.log("error");
                });
            }
        });
});

</script>
@endsection

@section('head')
<link rel="stylesheet" href="{{asset('bower_components/AdminLTE/plugins/datepicker/datepicker3.css')}}">
@endsection