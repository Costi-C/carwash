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
            <div class="row" style=" padding: 20px;">
                <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Model</th>
                            <th>Data</th>
                            <th>Actiuni</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach($vehicles as $vehicle)
                          <tr class="tr-{{$vehicle->id}}">
                            <td>{{$vehicle->id}}</td>
                            <td>{{$vehicle->type}}</td>
                            <td>{{$vehicle->created_at}}</td>
                            <td>
                                <button data-id="{{$vehicle->id}}" data-type="{{$vehicle->type}}" class="btn btn-sm btn-success edit">Editeaza</button>
                                <button data-id="{{$vehicle->id}}" class="btn btn-sm btn-danger delete">Sterge</button>
                            </td>
                          </tr>
                         @endforeach
                    </tbody>
                </table>

                <div class="col-md-6 update-vehicle-type hidden">
                    <div class="box box-info">
                        <div class="box-header with-border" style="background: #3c8dbc">
                        <h3 class="box-title" style="color: #fff; font-weight: bold; text-transform: uppercase;">Actualizeaza modelul</h3>
                        </div>

                        <form class="form-horizontal">
                            <div class="box-body" style="background: #3c8dbc">
                                <div class="form-group">
                                    <label for="vehicle-type" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Tip</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="vehicle-type" placeholder="" type="text" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="background: #3c8dbc">
                                <button type="submit" class="btn btn-success commit" style="font-weight: bold;">Actualizeaza</button>
                                <button type="submit" class="btn btn-danger pull-right roll-back" style="font-weight: bold;">Renunta</button>
                            </div>
                        <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
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

        $('body').on('click', '.delete', function(event){
          event.preventDefault();
          var id = $(this).data('id');
          $.ajax({
            url: '/admin/vehicles/remove',
            type: 'POST',
            data: {id: id}
          })
          .done(function(data){
            console.log(data);
          })
          .fail(function() {
            console.log("error");
          });
        });

        $('body').on('click', '.edit', function(event) {
            event.preventDefault();
            $('.update-vehicle-type').removeClass('hidden');
            var id = $(this).data('id');
            var type = $(this).data('type');
            $('#vehicle-type').attr('placeholder', type);
            $('#example_wrapper').hide();

            var typeName = $('#vehicle-type').val();
            $('body').on('click', '.commit', function(event) {
                event.preventDefault();
                typeName = $('#vehicle-type').val();
                if ($.trim(typeName) == '' || typeName.match(/^\d+$/)) {
                    $.growl.warning({title: "Atentie!!!", message: "Valoarea introdusa nu este corecta!"});
                }else{                
                   $.ajax({
                       url: '/admin',
                       type: 'POST',
                       data: {id: id, type: typeName}
                   })
                   .done(function(data) {
                       $('#vehicle-type').val('');
                       setTimeout(function(){
                        $('.update-vehicle-type').hide(function() {
                         window.location.reload();                         
                        });
                        }, 5000);
                   })
                   .fail(function() {
                       console.log("error");
                   });

                }
            });
        });

        $('body').on('click', '.roll-back', function(event){
            event.preventDefault();
            $('#vehicle-type').val('');
            $('.update-vehicle-type').addClass('hidden');
            $('#example_wrapper').show();
        });
});
</script>
@endsection