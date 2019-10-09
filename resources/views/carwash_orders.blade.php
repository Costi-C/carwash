<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" id="main-style-css" href="{{ asset("carwash_components/bootstrap/css/bootstrap.min.css")}}" type="text/css" media="all">	
	<link rel="stylesheet" id="" href="{{ asset("carwash_components/fa/css/font-awesome.min.css")}}" type="text/css" media="all">
	<link rel="stylesheet" id="main-style-css" href="{{ asset("carwash_components/css/dataTables.bs.css")}}" type="text/css" media="all">
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
</head>
<body style="background: #ddd">
<a href="{{url('/')}}">
<div style="float: left;width: 66px;text-align: center;top: 7.6%;margin-left: 12px;position: sticky;background: #199CDB;line-height: 56px; height: 56px; z-index: 1; border: 2px solid white;">
	<span id="to-top" style="font-size: 44px;color: white;">
		<i class="fa fa-caret-left"></i>
	</span>
	
</div>
</a>
<div class="print-preview" style="float: right;width: 66px;text-align: center;top: 7.6%;margin-right: 12px; position: sticky; background: #199CDB;line-height: 56px; height: 56px; z-index: 1; border: 2px solid white;">
	<span id="to-top" style="font-size: 44px;color: white;">
		<i class="fa fa-print"></i>
	</span>	
</div>

<div class="container" style="background: white">
	<div class="row" style=" padding: 20px;">
		<table id="example" class="table table-striped table-responsive" cellspacing="0">
        <thead>
            <tr>
                <th>Nr. imatriculare</th>
                <th>Angajat</th>
                <th>Pachete</th>
                <th>Produse</th>
                <th>Data</th>
                <th>Total</th>
                <th>Actiuni</th>
            </tr>
        </thead>
        <tbody>
        	@foreach ($orders as $order)        		
        	    <tr class="tr-{{$order->id}} @if($order->deleted != NULL) text-danger @endif">
	                <td>{{$order->customer->registration_plate}}</td>
	                <td>{{$order->employee->name}}</td>
	                <td>
					 	@foreach ($order->services as $service)
					     	@unless($service->category->name == 'barservice')<span>{{$service->name}}</span><br/> @endunless
						@endforeach 
					</td>

					<td>
					 	@foreach ($order->services as $service)
					     	@if($service->category->name == 'barservice')<span>{{$service->name}} * {{$service->pivot->quantity}}</span><br/> @endif
						@endforeach 
					</td>
					             
	                <td>{{$order->created_at}}</td>
	                <td>@if($order->deleted == NULL) {{$order->total}} @else 0 @endif RON</td>
	                <td>
	                	@if($order->deleted == NULL)
	                	<a href="/orders/{{$order->id}}" class="btn btn-sm btn-warning edit">Editeaza</a>
	                	<button data-id="{{$order->id}}" class="btn btn-sm btn-danger delete">Sterge</button>
	                	@else
						<button disabled="disabled" class="btn btn-sm btn-warning edit">Editeaza</button>
	                	<button disabled="disabled" class="btn btn-sm btn-danger delete">Sterge</button>
	                	@endif
	                </td>
	            </tr>	            
			@endforeach
        </tbody>
    </table>
	</div>
</div>

<script type="text/javascript" src="{{ asset("carwash_components/jquery/jquery.js")}}"></script>
<script type="text/javascript" src="{{ asset("carwash_components/bootstrap/js/bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{ asset("carwash_components/jquery/dataTable.js")}}"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	    var table = $('#example').DataTable();   
	    $('#example_filter input').addClass('first-row');
	    $("#example thead tr th").addClass('thead');
	    $("#example tfoot tr th").addClass('thead');
	    $("#example tbody tr ").addClass('tbody');
	    $("#example tbody tr td").addClass('tdposition');
	    $("#example tbody tr td button").addClass('tdbutton');

	    $('body').on('click', 'th', function(event) {
	    	event.preventDefault();
	    	$('.dataTables_empty').css({
				"text-transform": "uppercase",
				"font-weight": "bold",
				"font-size": "15px"
			});
	    });

	   	$('#example_wrapper').children(1).css('display', 'flex');


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
			var row = $('tbody tr').data('row');

			var message = prompt("Introduceti motivul:", "");
			if(message != null && message != ""){
				console.log(message);

				$.ajax({
					url: '/all-orders/remove',
					type: 'POST',				
					data: {id: id, message: message}
				})
				.done(function(data){
					$('.tr-'+ id).addClass('text-danger');
					var td = $('.tr-'+ id).find('.edit').parent();
					td.empty();
					td.append('<button disabled="disabled" class="btn btn-sm btn-warning edit">Editeaza</button>'+
		                	'<button disabled="disabled" class="btn btn-sm btn-danger delete">Sterge</button>');
					td.prev().text('0 RON');
					table.draw();

					$('.dataTables_empty').css({
						"text-transform": "uppercase",
						"font-weight": "bold",
						"font-size": "15px"				
					});
				})
				.fail(function() {
					console.log("error");				
				});
			}
		});
		var total = 0.0;

		$('body').on('click', '.print-preview', function(event){
			event.preventDefault();	
			window.print();			
		});
		
 
});
</script>
</body>
</html>