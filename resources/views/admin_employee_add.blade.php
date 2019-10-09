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
            <div class="col-md-12" style="padding: 10px 0 0 10px; margin-bottom: 10px">                 
                 <input id="adauga-angajat" class="btn btn-md btn-danger" value="Adauga angajat" type="button">
                 <form class="form-inline hidden new-employee">                  
                  <input id="add" class="btn btn-md btn-danger" value="Adauga" type="button">                  
                  <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="employee-name" placeholder="Nume angajat">
                  <input type="button" class="btn btn-primary cancel" value="Renunta">
                </form>
            </div>
            <div class="row" style=" padding: 20px;">
                <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id angajat</th>
                            <th>Nume</th>
                            <th>Data</th>
                            <th>Actiuni</th>
                        </tr>
                    </thead>

                    <tbody>
                          @foreach($employees as $employee)
                          <tr class="tr-{{$employee->id}}">
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->created_at}}</td>
                            <td>
                                <button data-id="{{$employee->id}}" class="btn btn-sm btn-danger delete">Sterge</button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>

                <table id="post-example hidden"></table>
            </div>
        </div>

@endsection

@section('javascript')
<script src="{{asset('bower_components/AdminLTE/datatables/dataTable.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#example').DataTable();
        $('#example_filter input').addClass('first-row');
        $("#example thead tr th").addClass('thead');
        $("#example tfoot tr th").addClass('thead');
        $("#example tbody tr").addClass('tbody');
        $("#example tbody tr td").addClass('tdposition');
        $("#example tbody tr td button").addClass('tdbutton');

        $('body').on('click', 'th', function(event) {
          event.preventDefault();
          $('.dataTables_empty').css({
          "text-transform": "uppercase",
          "font-weight": "bold"
        });
    });         

    $(".paginate_button").each(function(){
        var parent = $(this).parent().parent().parent().parent().parent();
        var row = parent.children().eq(1);
        var body = row.children().children().children().eq(2);
        body.addClass('tbody');
        body.addClass('tdposition');        
    });

    $('body').on('click', '#adauga-angajat', function(event) {
      event.preventDefault();
      $('#adauga-angajat').hide();
      $('.new-employee').removeClass('hidden');

      $('#add').click(function(){
        var name = $('#employee-name').val();
        if (name == ''){
          $.growl.error({ message:"Introduceti un nume!!!"});
        } else {
            $.ajax({
                url: '/admin/employees',
                type: 'POST',
                dataType: "json",              
                data: {name: name}
            })
             .done(function(data) {
                $.growl.notice({ message:"Angajat adaugat!!!"});
                $('#adauga-angajat').show();
                $('.new-employee').addClass('hidden');
                $('#employee-name').val('');
                location.reload();                            
            })
             .fail(function() {
                 console.log("error");
            });
        }
      });

      $('.cancel').on('click', function(event) {
        event.preventDefault();
        $('#employee-name').val('');
        $('#adauga-angajat').show();
        $('.new-employee').addClass('hidden');
      });
    });

    $('body').on('click', '.delete', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      $.ajax({
        url: '/admin/employees/remove',
        type: 'POST',
        data: {id: id}
      })
      .done(function(data){
        table.row('.tr-'+ id).remove().draw();
        $('.dataTables_empty').css({
          "text-transform": "uppercase",
          "font-weight": "bold"
        });
      })
      .fail(function() {
        console.log("error");
      });          
    });
});
</script>
@endsection