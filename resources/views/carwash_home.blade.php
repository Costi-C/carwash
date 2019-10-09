<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Panda Wash System </title>
	<!--meta-->
	<meta charset="UTF-8">		
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="format-detection" content="telephone=no">
	<!--style-->		
	
	<link href="http://fonts.googleapis.com/">	
	<link rel="stylesheet" href="{{ asset('carwash_components/css/style.css')}}" type="text/css" media="all">
	<style id="main-style-inline-css" type="text/css">
		.theme_page{
			width:1110px;
		}
	</style>
<link rel="stylesheet" href="{{ asset('carwash_components/css/responsive.css')}}" type="text/css" media="all">


<link rel="stylesheet" href="{{ asset('carwash_components/css/css.css')}}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('carwash_components/css/public.css')}}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('carwash_components/css/icon.css')}}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('carwash_components/css/jquery.growl.css')}}" type="text/css" media="all">
<link rel="stylesheet" href="{{ asset('carwash_components/fa/css/font-awesome.min.css')}}" type="text/css" media="all">
</head>

<body style="background: #ddd;">
	<a href="{{url('/all-orders')}}">
		<div style="float: right;width: 66px;text-align: center;top: 43%;margin-right: 12px;position: sticky;background: #199CDB;line-height: 56px; height: 56px; z-index: 1; border: 2px solid white; cursor: pointer;">
			<span id="to-top" style="font-size: 44px;color: white;">
				<i class="fa fa-caret-right"></i>
			</span>
		</div>	
	</a>

	
	<div class="theme_page relative">
		<div class="clearfix">
			<div>
				<a href="{{url('/logout')}}"><input id="logout" class="cbs-button" value="Log out" type="submit" style="background: #199CDB; color: white; font-weight: bold; border:none; text-transform: uppercase;"></a>
			</div>		
			<div class="cbs-main cbs-clear-fix">
				<div class="cbs-form">			
					<ul class="cbs-main-list cbs-clear-fix cbs-list-reset">				
					<!-- Vehicle -->
					<li class="cbs-main-list-item cbs-main-list-item-vehicle-list cbs-clear-fix">
						<div class="new-order">
							<div style="padding: 10px; background-color: #199CDB;"> 
								<span style="color: white; text-transform: uppercase">comanda noua</span>
								<input type="text" class="customer-plate" placeholder="Nr. inmatriculare" style="text-transform:uppercase; font-weight: bold; color:black;">
								<input type="text" class="customer-phone" maxlength="10" placeholder="Contact client" style="text-transform:uppercase; font-weight: bold; color:black;">
							</div>
						</div>



						<div class="cbs-main-list-item-section-content cbs-clear-fix">
							<ul class="cbs-vehicle-list cbs-list-reset cbs-clear-fix">
								@foreach($vehicles as $vehicle)
								<li data-category="{{$vehicle->category_id}}" data-id="$vehicle->id">
									<div>
										<div class="cbs-vehicle-icon {{$vehicle->icon}}"></div>
										<div class="vehicle-type">{{$vehicle->type}}</div>
									</div>
								</li>
								@endforeach
							</ul>
						</div>					
					</li>

				
					<!-- Package -->
					<li class="cbs-main-list-item cbs-main-list-item-package-list cbs-clear-fix">						
						<div class="cbs-main-list-item-section-content cbs-clear-fix">		
							<ul class="cbs-package-list cbs-list-reset cbs-clear-fix">

							</ul>
						</div>

						<div class="new-order">
							<div style="padding: 10px; background-color: #199CDB;"> 
								<span style="color: white; text-transform: uppercase;">alege angajat</span>
								<div style="display: inline;">
									<select class="choose-employee" style="background: #ecf0f5;border: none;font-size: 14px; font-weight: bold; height: 40px;padding: 5px;-moz-appearance: none;padding: 6px;width: 27%;border-radius: 3px; text-transform: uppercase;">
									<option value="0" style="text-transform: uppercase;">ALEGE</option>
									@foreach ($employees as $employee)
									    <option value="{{$employee->id}}" style="text-transform: uppercase;">{{$employee->name}}</option>
									@endforeach	
								</select>
								</div>	
							</div>
						</div>						
					</li>
				
				
					<!-- Service -->
					<li class="cbs-main-list-item cbs-main-list-item-service-list cbs-clear-fix">					
						<div class="cbs-main-list-item-section-content cbs-clear-fix">		
							<ul class="cbs-service-list cbs-list-reset cbs-clear-fix cbs-state-to-hidden">
								@foreach($products as $product)
								<li class="cbs-clear-fix" id="product-{{$product->id}}" data-price="{{$product->price}}">
									<div class="cbs-service-name">
										<span style="text-transform: uppercase; font-weight: bold; font-size: 20px;">{{$product->name}}</span>
									</div>

									<div class="cbs-service-duration" style="display: flex; width: auto;">
										<div class="sp-minus ddd" style="width:35px;float:left; text-align:center; border:2px solid #199CDB;"> 
										    <span style="line-height: 40px;font-weight: bold;font-size: 20px;">
											    <i class="fa fa-caret-left" aria-hidden="true" style="color: #199CDB;"></i>
										    </span>
									    </div>
									    <div class="sp-input" style="float: left; width:30px;">
											<input type="text" class="bar-product-quantity" onfocus="this.placeholder=''" onblur="this.placeholder='0'" value="1" style="text-align: center; color: #199CDB; font-weight: bold;">
										 </div>
										<div class="sp-plus ddd" style="float: left;width:35px;text-align:center;border:2px solid #199CDB;"> 
											<span style="line-height: 40px;font-weight: bold;font-size: 20px;">
												<i class="fa fa-caret-right" aria-hidden="true" style="color: #199CDB;"></i>
											</span>
									    </div>										
									</div>

									<div class="cbs-service-price">										
										<span style="text-transform:uppercase; font-weight: bold; font-size:20px; color: black;">{{$product->price}} LEI</span>			
									</div>

									<div class="cbs-button-box">
										<input type="button" data-id="{{$product->id}}" class="cbs-button selectProduct" value="Adauga" style="padding-left: 27px; padding-right: 27px; font-weight: bold; text-transform: uppercase; font-size:14px;">								
									</div>
								</li>
								@endforeach

<!-- 								<li class="cbs-clear-fix cbs-service-id-37">
									<div class="cbs-service-name">
										<span>Heineken</span>
									</div>

									<div class="cbs-service-duration" style="display: flex; width: auto;">
										<div class="sp-minus ddd" style="width:35px;float:left; text-align:center; border:2px solid #199CDB;"> 
										    <span style="line-height: 40px;font-weight: bold;font-size: 20px;">
											    <i class="fa fa-caret-left" aria-hidden="true" style="color: #199CDB;"></i>
										    </span>
									    </div>
									    <div class="sp-input" style="float: left; width:30px;">
											<input type="text" class="bar-product-quantity" placeholder="0" onfocus="this.placeholder=''" onblur="this.placeholder='0'" value="0" style="text-align: center; color: #199CDB; font-weight: bold;">
										 </div>
										<div class="sp-plus ddd" style="float: left;width:35px;text-align:center;border:2px solid #199CDB;"> 
											<span style="line-height: 40px;font-weight: bold;font-size: 20px;">
												<i class="fa fa-caret-right" aria-hidden="true" style="color: #199CDB;"></i>
											</span>
									    </div>										
									</div>

									<div class="cbs-service-price">									
										<span>5.50 LEI</span>				
									</div>

									<div class="cbs-button-box">
										<input type="button" class="cbs-button selectProduct" value="Adauga" style="padding-left: 27px; padding-right: 27px;" disabled="disabled">								
									</div>
								</li>

								

								<li class="cbs-clear-fix cbs-service-id-40">
									<div class="cbs-service-name">
										<span>Windows In &amp; Out</span>			
									</div>

									<div class="cbs-service-duration" style="display: flex; width: auto;">
										<div class="sp-minus ddd" style="width:35px;float:left; text-align:center; border:2px solid #199CDB;"> 
										    <span style="line-height: 40px;font-weight: bold;font-size: 20px;">
											    <i class="fa fa-caret-left" aria-hidden="true" style="color: #199CDB;"></i>
										    </span>
									    </div>
									    <div class="sp-input" style="float: left; width:30px;">
											<input type="text" class="bar-product-quantity" placeholder="0" onfocus="this.placeholder=''" onblur="this.placeholder='0'" value="0" style="text-align: center; color: #199CDB; font-weight: bold;">
										 </div>
										<div class="sp-plus ddd" style="float: left;width:35px;text-align:center;border:2px solid #199CDB;"> 
											<span style="line-height: 40px;font-weight: bold;font-size: 20px;">
												<i class="fa fa-caret-right" aria-hidden="true" style="color: #199CDB;"></i>
											</span>
									    </div>										
									</div>

									<div class="cbs-service-price">										
										<span>4.25 LEI</span>				
									</div>

									<div class="cbs-button-box">
										<input type="button" class="cbs-button selectProduct" value="Adauga" style="padding-left: 27px; padding-right: 27px;" disabled="disabled">								
									</div>
								</li>

								<li class="cbs-clear-fix cbs-service-id-37 cbs-state-to-hidden">
									<div class="cbs-service-name">
										<span>Interior Vacuum</span>
									</div>

									<div class="cbs-service-duration" style="display: flex; width: auto;">
										<div class="sp-minus ddd" style="width:35px;float:left; text-align:center; border:2px solid #199CDB;"> 
										    <span style="line-height: 40px;font-weight: bold;font-size: 20px;">
											    <i class="fa fa-caret-left" aria-hidden="true" style="color: #199CDB;"></i>
										    </span>
									    </div>
									    <div class="sp-input" style="float: left; width:30px;">
											<input type="text" class="bar-product-quantity" placeholder="0" onfocus="this.placeholder=''" onblur="this.placeholder='0'" value="0" style="text-align: center; color: #199CDB; font-weight: bold;">
										 </div>
										<div class="sp-plus ddd" style="float: left;width:35px;text-align:center;border:2px solid #199CDB;"> 
											<span style="line-height: 40px;font-weight: bold;font-size: 20px;">
												<i class="fa fa-caret-right" aria-hidden="true" style="color: #199CDB;"></i>
											</span>
									    </div>										
									</div>

									<div class="cbs-service-price">									
										<span>5.50 LEI</span>				
									</div>

									<div class="cbs-button-box">
										<input type="button" class="cbs-button selectProduct" value="Adauga" style="padding-left: 27px; padding-right: 27px;" disabled="disabled">								
									</div>
								</li> -->

								<div class="cbs-button cbs-button-service-more">
									<span class="show-more">Extinde...</span>
									<span class="show-less cbs-state-hidden">Restrange...</span>
								</div>
							</ul>								
						</div>						
					</li>				
				</ul>

			
				<div class="cbs-form-summary cbs-clear-fix">					
					<input id="adauga-comanda" class="cbs-button" value="Adauga comanda" type="submit" style="text-transform: uppercase; font-weight: bold;">
				</div>
			</div>			
		</div>

	</div>
	</div>
		
<script type="text/javascript" src="{{ asset('carwash_components/jquery/jquery.js')}}"></script>
<script type="text/javascript" src="{{ asset('carwash_components/jquery/jquery.growl.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/jsrender.min.js')}}"></script>

<script id="servicesTmpl" type="text/x-jsrender">
  	@{{for services}}
    <li data-id=@{{:id}} id="service-@{{:id}}" data-price="@{{:price}}">
		<h5 class="cbs-package-name">@{{:name}}</h5>
		<div class="cbs-package-price">								
			<span class="cbs-package-price-currency">LEI</span>
			<span class="cbs-package-price-unit">@{{:price.split('.')[0]}}</span>
			<span class="cbs-package-price-decimal">@{{:price.split('.')[1]}}</span>
		</div>
		<div class="cbs-package-duration">
			<span class="cbs-meta-icon cbs-meta-icon-duration"></span>
			<span>25 min</span>
		</div>
		<div class="cbs-button-box">
			<input type="button" name="serviciu" class="cbs-button" value="Alege">
		</div>
	</li>
	@{{/for}}
</script>

<script type="text/javascript">
$(document).ready(function(){

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});



	/******************************************************************************/
    /*CUSTOMER                                                                    */
    /******************************************************************************/
	var customer = {};
	var total = 0.0;
	$('body').on('change', '.customer-plate', function(e){
		var plate = $('.customer-plate').val();

		if ($.trim(plate) != '' && plate != null){
			customer["plate"] = plate;					
		}
		console.log(customer);	
	});

	$('body').on('change', '.customer-phone', function(e){
		var phone = $('.customer-phone').val();

		if (phone.length == 10 && $.trim(phone) != '') {
			customer["phone"] = phone;
		} else {
			$.growl.error({ message:"Numarul introdus este incorect!!!"});			
			customer.phone = "";
		}
		console.log(customer);		
	});

	/******************************************************************************/
    /*VEHICLE                                                                     */
    /******************************************************************************/

	$(".cbs-vehicle-list li").click(function(){
		if(!$(this).hasClass('cbs-state-selected')) {
			$(".cbs-vehicle-list li").removeClass('cbs-state-selected');
			$(this).addClass('cbs-state-selected');

			var category_id = $(this).data('category');
			var id = $(this).data('id');

			total -= totalServicesAmount;
			totalServicesAmount = 0.0;
			services = [];

			$.ajax({
				url: 'categories/'+category_id+'/services',
				type: 'GET'
			})
			.done(function(data) {
				console.log(data);
				var servicesTmpl = $.templates("#servicesTmpl");
				var html = servicesTmpl.render({services: data});

				$('.cbs-package-list').empty();

				$(html).appendTo('.cbs-package-list');

			})
			.fail(function() {
				console.log("error");
			});
			
		}
	});
	
	/******************************************************************************/
    /*EMPLOYEE                                                                    */
    /******************************************************************************/
	var employee = 0;
	$('body').on('change', '.choose-employee', function(e){
		employee = parseInt($(this).val());
	});


	/******************************************************************************/
    /*SERVICES                                                                   */
    /******************************************************************************/
	var services = [];
	var totalServicesAmount = 0.0;
	
	$('body').on('click', ".cbs-package-list li" ,function(){
		if ($(this).hasClass('cbs-state-selected')){
			$(this).removeClass("cbs-state-selected");
			for (var i = 0; i < services.length; i++){
				if(services[i] == $(this).data('id')){
					services.splice(i, 1);															
					break;
				}
			}	 
		} else {
			$(this).addClass("cbs-state-selected");		
			services.push($(this).data('id'));
		}

		total -= totalServicesAmount;
		totalServicesAmount = 0.0;

		for (var i = 0; i < services.length; i++) {
			totalServicesAmount += parseFloat( $('#service-' + services[i]).data('price') );
		}

		total += totalServicesAmount;

		console.log(total);
		console.log(services);
	});


	/******************************************************************************/
    /*PRODUCTS                                                                    */
    /******************************************************************************/
	var products = [];
	var totalProductAmount = 0.0;
	var newVal = '';	
    $(".cbs-service-list li").on("click", ".ddd",function (){
	    var button = $(this);
	    var oldValue = button.closest('.cbs-service-duration').find(".bar-product-quantity").val();

	    console.log('adsad');

    	if (button.hasClass('sp-plus')){
         newVal = parseFloat(oldValue) + 1;

	    } else {	        
	        if (oldValue > 1 && oldValue.match(/^\d+$/)) {
	            newVal = parseFloat(oldValue) - 1;
	        } else {
	            newVal = 1;
	        }
	    }

	    button.closest('.cbs-service-duration').find(".bar-product-quantity").val(newVal);
	});

	$(".cbs-service-list li").on("click", ".selectProduct" , function(){				
		var parent = $(this).parent().parent();		
		if (parent.hasClass('cbs-state-selected')) {
			parent.removeClass('cbs-state-selected');
			for (var i = 0; i < products.length; i++){	
				console.log(products[i], parent.children('.cbs-service-name').children("span").text());
				if(products[i].id == $(this).data('id')){
					products.splice(i, 1);
					break;
				}
			}
			console.log(products);
		} else {
			parent.addClass("cbs-state-selected");
			var id = $(this).data('id');
		    var quantity = parent.children('.cbs-service-duration').children('.sp-input').children(".bar-product-quantity").val();
		    var price = parent.children(".cbs-service-price").children("span").text();
		    price = price.substr(0,price.indexOf(' '));		    

	        products.push({			    	
		        id: id,
		        quantity: quantity,
		    });

		}

		total -= totalProductAmount;
		totalProductAmount = 0.0;

	    for (var i = 0; i < products.length; i++) {
	    	var productAmount = parseFloat(products[i].quantity) * parseFloat( $('#product-' + products[i].id ).data('price') );
	    	totalProductAmount += parseFloat(productAmount);
		}

		total += totalProductAmount;
	});


	$(".show-more").click(function(){
		var parent = $(this).parent().parent();
		var li = $();
		$(".show-more").hide();

		if (parent.children("li").hasClass("cbs-state-to-hidden")) {
			li = parent.children("li .cbs-state-to-hidden");
			console.log(li.text());
			parent.children("li").removeClass("cbs-state-to-hidden");
		}

		$(".show-less").show();
		$(".show-less").click(function(){			
			li.addClass("cbs-state-to-hidden");
			$(".show-less").hide();
			$(".show-more").show();
		});		
	});

	$('body').on('click', '#adauga-comanda', function(event) {
		event.preventDefault();

		var hasError = false;

		if (customer["plate"] == null){
			hasError = true;
			$.growl.error({ message:"Introduceti numar imatriculare!!!"});
		} 

		if(services.length == 0){
			hasError = true;			
			$.growl.error({ message:"Alegeti cel putin un serviciu!!!"});
		}

		if(employee == 0){
			hasError = true;			
			$.growl.error({ message:"Alegeti un angajat!!!"});
		} 

		if(!hasError){
			$.ajax({
				url: '/orders',
				type: 'POST',
				data: {customer:customer, products: products, employee: employee, services: services},
			})
			.done(function(data) {
				$('.customer-plate').val('');
				$('.customer-phone').val('');
				$('.bar-product-quantity').val(1);
				$(".cbs-vehicle-list li").removeClass('cbs-state-selected');
				$(".cbs-package-list li").removeClass('cbs-state-selected');
				$(".cbs-service-list li").removeClass('cbs-state-selected');
				console.log(data);

				$('.choose-employee').val(0);
				$('.choose-employee').change();

				totalProductAmount = 0.0;
				totalServicesAmount = 0.0;
				total = 0.0;
				products = [];
				services = [];
				employee = 0;
				customer = {};
				window.location.href = '/';

			})
			.fail(function() {
				console.log("error");
			});
		}		
	});
});
</script>
</body>
</html>