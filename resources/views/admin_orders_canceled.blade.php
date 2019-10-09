@extends('admin_template')

@section('head')
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
    <div class="box">
        <div class="row table-content" style=" padding: 20px;">
            <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Angajat</th>
                        <th>Pret</th>
                        <th>Total</th>
                        <th>Motiv</th>
                    </tr>
                </thead>

                <tbody>
                     @foreach($orders as $order)
                      <tr class="tr-{{$order->id}} text-danger">
                        <td>{{$order->customer->registration_plate}}</td>
                        <td>{{$order->employee->name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->total}}</td>
                        <td>{{$order->deleted}}</td>
                      </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('javascript')
<script src="{{asset('bower_components/AdminLTE/datatables/dataTable.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();   
        $('#example_filter input').addClass('first-row');
        $("#example thead tr th").addClass('thead');
        $("#example tfoot tr th").addClass('thead');
        $("#example tbody tr ").addClass('tbody');
        $("#example tbody tr td").addClass('tdposition');
        $("#example tbody tr td button").addClass('tdbutton');

        $(".paginate_button").each(function(){
            var parent = $(this).parent().parent().parent().parent().parent();
            var row = parent.children().eq(1);
            var body = row.children().children().children().eq(2);
            body.addClass('tbody');
            body.addClass('tdposition');        
        });    
});
</script>
@endsection