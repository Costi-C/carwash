/******************************************************************************/
/*HOME                                                                  */
/******************************************************************************/
OrdersController
    public function getServicesForCategory(Request $request, $id){
    	$services = Category::find($id)->services;        
    	return response()->json($services);
    }

Cand dau click pe categorie nu imi ia serviciile.

carawsh_home
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
				url: '/categories/'+category_id+'/services',
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

intra direct pe eroare.

/******************************************************************************/
/*/all-orders                                                                 */
/******************************************************************************/
OrdersController
    public function getAllOrders(){        
        $orders = Order::all();               
        return view('carwash_orders', ['orders' => $orders]);     
       
    }

cand le randez in pagina, imi afiseaza numarul de inmatriculare, numele angajatului 
serviciile nu pot sa le iau denumirea imi afiseaza doar id-ul.Poate mai trebuie niste
chei acolo unde am declarat belongsToMany() ca sa pot accesa valorile din tabela parinte.
nici pretul nu am stiut cum sa-l iau imi da ceva de genul "cannot acces object".
id-urile pe butoane(editeaza, sterge) cred ca le-am luat bine.

nu pot sa calculez totalul pentru fiecare comanda.


/******************************************************************************/
/*/admin                                                                      */
/******************************************************************************/

admin_template asta e template-ul
in sidebar
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Angajati</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('/admin/employee')}}">Modifica</a></li>
            <li><a href="{{URL::to('/admin/employee/track')}}">Venituri</a></li>
          </ul>
        </li>
cand dau click pe modifica nu imi incarca resursele bootstrap si js.
nu-mi merg cacaturile alea cu @extends si @yields

/******************************************************************************/
/*/sa-mi bag pula in mortii lor                                                                     */
/******************************************************************************/