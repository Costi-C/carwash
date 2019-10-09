@extends('admin_template')

@section('head')
 <link rel="stylesheet" href="{{asset('bower_components/AdminLTE/datatables/dataTables.bs.css')}}">
 <link rel="stylesheet" href="{{ asset('carwash_components/css/jquery.growl.css')}}" type="text/css" media="all">
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
            <div class="row main-section" style="padding:10px 0 10px 20px">
                <button class="btn btn-success add-new" style="float: left;">Adauga produs</button>
                <div class="col-md-6 hidden">                                
                <div class="box box-info">                    
                    <div class="box-header with-border" style="background: #3c8dbc">
                        <h3 class="box-title" style="color: #fff; font-weight: bold; text-transform: uppercase;">Informatii produs nou</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body" style="background: #3c8dbc">
                            <div class="form-group">
                                <label for="newProduct" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Nume</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="newProductName" placeholder="Nume" type="text" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newProductPrice" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase">Pret</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="newProductPrice" placeholder="Pret" type="text" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="background: #3c8dbc">
                            <button type="submit" class="btn btn-success add" style="font-weight: bold;">Adauga</button>
                            <button type="submit" class="btn btn-danger pull-right return" style="font-weight: bold;">Renunta</button>                            
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                </div>
            </div>

            <div class="row table-content" style=" padding: 20px;">
                <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nume</th>
                            <th>Pret</th>
                            <th>Actiuni</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach($services as $service)
                          <tr class="tr-{{$service->id}}">
                            <td>{{$service->id}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{$service->price}}</td>
                            <td>
                                <button data-id="{{$service->id}}" data-name="{{$service->name}}" data-price="{{$service->price}}" class="btn btn-sm btn-success edit">Editeaza</button>
                                <button data-id="{{$service->id}}" class="btn btn-sm btn-danger delete">Sterge</button>
                            </td>
                          </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>

            <div class="row edit-section hidden" style="padding:10px 0 10px 20px">               
                <div class="col-md-6 hidden">                                
                <div class="box box-info">                    
                    <div class="box-header with-border" style="background: #3c8dbc">
                        <h3 class="box-title" style="color: #fff; font-weight: bold; text-transform: uppercase;">Editeaza produs</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal">
                        <div class="box-body" style="background: #3c8dbc">
                            <div class="form-group">
                                <label for="newProduct" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Nume</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="updateProductName" placeholder="" type="text" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="newProductPrice" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase">Pret</label>

                                <div class="col-sm-10">
                                    <input class="form-control" id="updateProductPrice" placeholder="" type="text" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer" style="background: #3c8dbc">
                            <button data-id="{{$service->id}}" type="submit" class="btn btn-success update" style="font-weight: bold;">Salveaza</button>
                            <button type="submit" class="btn btn-danger pull-right rollback" style="font-weight: bold;">Renunta</button>                            
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
<script type="text/javascript" src="{{ asset('carwash_components/jquery/jquery.growl.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable();   
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

        
        $('body').on('click', '.add-new', function(event){
          event.preventDefault();
          $('.add-new').hide();
          $('.table-content').hide();
          $('.box .box-info').parent().removeClass('hidden');
                    
          $('body').on('click', '.add', function(event){
            event.preventDefault();
            var name = $('#newProductName').val();
            var price = $('#newProductPrice').val();                       
            var hasError = false;

            if ($.trim(name) == '' || name.match(/^\d+$/)){
              hasError = true;
              $.growl.notice({ message:"Numele introdus este incorect!!!"});
            }

            if ($.trim(price) == '' || !price.match('[+-]?([0-9]*[.])?[0-9]+')){
              hasError = true;
              $.growl.notice({ message:"Pretul introdus este incorect!!!"});
            }

            if (!hasError){
              $.ajax({
                url: '/admin/bistro/packages/add',
                type: 'POST',                
                data: {name: name, price: price}
              })
              .done(function(data) {
                console.log(data);
                location.reload();
              })
              .fail(function() {
                console.log("error");
                $.growl.notice({message: "Produsul deja exista.Poate fi doar actualizat!!!"});
              });              
            }
          });
        });

        $('.return').on('click', function(event) {
          event.preventDefault();
          $('#newProductName').val('');
          $('#newProductPrice').val('');
          $('.box .box-info').parent().addClass('hidden');
          $('.add-new').show();
          $('.table-content').show();
        });


        $('body').on('click', '.edit', function(event) {
          event.preventDefault();
          $('.main-section').addClass('hidden');
          $('.table-content').addClass('hidden');          
          $('.edit-section').removeClass('hidden');
          $('.edit-section').children('.col-md-6').removeClass('hidden');          

          var id = $(this).data('id');
          var name = $(this).data('name');
          var price = $(this).data('price');
          $("#updateProductName").attr("placeholder", name);
          $('#updateProductPrice').attr("placeholder", price);

          $('body').on('click', '.update',function(event){
            event.preventDefault();           
            var newName =  $('#updateProductName').val();
            var newPrice = $('#updateProductPrice').val();
            var hasError = false;

            if ($.trim(newName) == '' || name.match(/^\d+$/)) {
              hasError = true;
              alert('Numele introdus este incorect');
            }

            var regex = '[+-]?([0-9]*[.])?[0-9]+';
            if ($.trim(newPrice) == '' || !newPrice.match(regex)) {
              hasError = true;
              alert('Pretul introdus este incorect');
            }

            if (!hasError){
              $.ajax({
                url: '/admin/bistro/packages/update',
                type: 'POST',                
                data: {id: id, name: newName, price: newPrice}
              })
              .done(function(data){
                console.log(data);
                $('#updateProductName').val('');
                $('#updateProductPrice').val('');
                $('.main-section').removeClass('hidden');
                $('.table-content').removeClass('hidden');          
                $('.edit-section').addClass('hidden');
                $('.edit-section').children('.col-md-6').addClass('hidden');
                table.row('.tr-' + id).draw();
              })
              .fail(function(){
                console.log("error");
              });              
            }
          });
        });



        $('body').on('click', '.delete', function(event) {
          event.preventDefault();
          var id = $(this).data('id');

          $.ajax({
            url: '/admin/bistro/packages/remove',
            type: 'POST',            
            data: {id: id}
          })
          .done(function(data) {
            console.log(data);
            location.reload();
            
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });          
        });

});
</script>
@endsection