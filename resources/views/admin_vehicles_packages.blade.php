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
            <div class="row " style="padding: 10px">
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success add">Adauga pachet</button>
                </div>
           </div>

            <div class="row" style=" padding: 20px;">
                <table id="example" class="table table-striped table-responsive" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nume</th>
                            <th>Pachet</th>
                            <th>Pret</th>
                            <th>Actiuni</th>
                        </tr>
                    </thead>

                    <tbody>
                          @foreach($packages as $package)
                          <tr class="tr-{{$package->id}}">
                            <td>{{$package->id}}</td>
                            <td>{{$package->category->name}}</td>

                            <td>
                                @foreach($package->category->services as $service)
                                    <span>{{$service->name}}</span><br/>
                                @endforeach
                            </td>

                            <td>
                                @foreach($package->category->services as $service)                            
                                    <span>{{$service->price}}</span><br/>
                                @endforeach
                            </td>
                            
                            <td>
                                @foreach($package->category->services as $service)
                                <button data-id="{{$service->id}}" data-name="{{$service->name}}" data-price="{{$service->price}}" data-category="{{$package->category->name}}" class="btn btn-sm btn-success edit">Editeaza</button>
                                <button data-id="{{$service->id}}" class="btn btn-sm btn-danger delete">Sterge</button>
                                <br/>                                
                                @endforeach                                                                
                            </td>
                          </tr>
                          @endforeach                        
                    </tbody>
                </table>

                <div class="col-md-6 update-package hidden">
                    <div class="box box-info">
                        <div class="box-header with-border" style="background: #3c8dbc">
                            <h3 class="box-title" style="color: #fff; font-weight: bold; text-transform: uppercase;"></h3>
                        </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                        <form class="form-horizontal">
                            <div class="box-body" style="background: #3c8dbc">
                                <div class="form-group">
                                    <label for="package-name" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Nume</label>
                                    <div class="col-sm-10">
                                     <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="package-name" placeholder="" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="package-price" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Pret</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="package-price" placeholder="" style="border-radius:3px; background: #ecf0f5; font-weight: bold;">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="background: #3c8dbc">
                                <button type="submit" class="btn btn-success update" style="font-weight: bold;">Modifica</button>
                                <button type="submit" class="btn btn-danger pull-right rollback" style="font-weight: bold;">Renunta</button>
                            </div>
                        <!-- /.box-footer -->
                        </form>
                    </div>     
                </div>

                <div class="col-md-6 add-package hidden">
                    <div class="box box-info">
                        <div class="box-header with-border" style="background: #3c8dbc">
                          <h3 class="box-title" style="color: #fff; font-weight: bold; text-transform: uppercase;">Adauga pachet</h3>

                        <form class="form-horizontal">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="selectCategory" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Categorie</label>
                              <div class="col-sm-10">
                                <select class="form-control" id="selectCategory" style="background: #ecf0f5; font-weight: bold">
                                    <option value="0">Alege o categorie</option>
                                    @foreach($packages as $package)
                                        <option value="{{$package->category->id}}">{{$package->category->name}}</option>
                                    @endforeach
                              </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="new-package-name" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Nume</label>
                              <div class="col-sm-10">
                               <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="new-package-name" placeholder="Nume" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="new-package-price" class="col-sm-2 control-label" style="font-weight: bold; color: white; text-transform: uppercase;">Pret</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" id="new-package-price" placeholder="Pret" style="border-radius:3px; background: #ecf0f5; font-weight: bold">
                              </div>
                            </div>
                          </div>
                          <div class="box-footer" style="background: #3c8dbc">
                            <button type="submit" class="btn btn-success insert" style="font-weight: bold;">Salveaza</button>
                            <button type="submit" class="btn btn-danger rollback-newpackage pull-right" style="font-weight: bold;">Renunta</button>
                          </div>                          
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

        $('body').on('click', '.add', function(event) {
            event.preventDefault();
            $('.add').parent().hide();
            $('.add-package').removeClass('hidden');
            $('#example_wrapper').hide();
        });


        $('.insert').on('click', function(event) {
            event.preventDefault();
            var hasError = false;
            var categoryId = $('#selectCategory').val();
            console.log(categoryId);
            if (categoryId == 0) {
                hasError = true;                
                $.growl.warning({title: "Atentie!!!", message: "Alegeti o categorie!" });
            }
            var newPackageName = $('#new-package-name').val();
            if ($.trim(newPackageName) == '' || newPackageName.match(/^\d+$/)) {
                hasError = true;
                $.growl.warning({title: "Atentie!!!", message: "Introduceti un nume!" });
            }

            var newPackagePrice = $('#new-package-price').val();
            if (newPackagePrice == '' || !newPackagePrice.match('[+-]?([0-9]*[.])?[0-9]+')) {
                hasError = true;
                $.growl.warning({title: "Atentie!!!", message: "Introduceti un pret!" });
            } else {
                var price = parseFloat(newPackagePrice);
                console.log(price);
            }
            if (!hasError) {
                $.ajax({
                    url: '/admin/vehicles/packages/add',
                    type: 'POST',                    
                    data: {id: categoryId, name: newPackageName, price: newPackagePrice},
                })
                .done(function(data){                   
                    $.growl.notice({title: "Succes!!!", message: "Categoria: {{$package->category->name}} are un nou pachet" });
                    newPackageName.val("");
                    newPackagePrice.val("");
                })
                .fail(function() {
                    console.log("error");
                    $.growl.notice({message: "Pachetul deja exista.Poate fi doar actualizat!!!"});
                })
                .always(function() {
                    console.log("complete");
                });                
            }
        });

        $('.rollback-newpackage').on('click', function(event) {
            event.preventDefault();
            $('#new-package-name').val("");
            $('#new-package-price').val("");
            $('#selectCategory').val("0");
            $('.add-package').addClass('hidden');
            $('.add').parent().show();
            $('#example_wrapper').show();
        });


        $('body').on('click', '.edit', function(event) {
            event.preventDefault();           
            $('#example_wrapper').hide();
            $('.add').parent().hide();           
            $('.update-package').removeClass("hidden");
            var packageId = $(this).data('id');
            var packageName = $(this).data('name');
            var packagePrice = $(this).data('price');
            var packageCategory = $(this).data('category');

            var asd = $('.box-header.with-border h3').text("Actualizeaza pachetul " + packageName + " din categoria " + packageCategory);            
            console.log(asd);        

            $('#package-name').val(packageName);
            $('#package-price').val(packagePrice);
            $('.update').on('click', function(event){
                event.preventDefault();
                var currName = $('#package-name').val();
                var currPrice = $('#package-price').val();

                $.ajax({
                    url: '/admin/vehicles/packages',
                    type: 'POST',                    
                    data: {id: packageId, name: currName, price: currPrice}
                })
                .done(function(data) {
                    console.log(data);
                    $('.add-package').attr("hidden");
                    $('#example_wrapper').show();
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


        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            var removePackageId = $(this).data('id');

            $.ajax({
                url: '/admin/vehicles/packages/remove',
                type: 'POST',                
                data: {id: removePackageId}
            })
            .done(function(data) {
                console.log(data);
                location.reload();
            })
            .fail(function() {
                console.log("error");
            });
            
        });

        $('.rollback').on('click', function(event) {
            event.preventDefault();
            $('.update-package').addClass("hidden");
            $('.add').parent().show();
            $('#example_wrapper').show();
        }); 

});
</script>
@endsection