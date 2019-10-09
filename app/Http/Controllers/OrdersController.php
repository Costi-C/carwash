<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Category;
use App\Employee;
use App\Vehicle;
use App\Order;
use App\Customer;
use App\User;

class OrdersController extends Controller
{

	/**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function newOrder(Request $request){
        $employees = Employee::all();
        $vehicles = Vehicle::all();

        $products = Category::where('name', 'barservice')->first()->services;
        return view('carwash_home', [
        	'employees' => $employees,
        	'vehicles' => $vehicles,
        	'products' => $products
        	]);
    }


    public function saveOrder(Request $request){
    	$input = $request->all();

    	$client = Customer::firstOrNew(['registration_plate' => $input['customer']['plate']]);

    	$client->registration_plate = $input['customer']['plate'];
        if(isset($input['customer']['phone']))
    	   $client->phone_number = $input['customer']['phone'];
    	$client->save();

    	$order = new Order;
    	$order->employee_id = $input['employee'];
    	$order->customer_id = $client->id;
    	$order->save();

    	$services = [];
    	foreach ($input['services'] as $service){
    		$services[] = ['order_id' => $order->id, 'service_id' => $service, 'quantity' => 1];
    	}       
        
        if (isset($input['products'])) {
           foreach ($input['products'] as $product) {          
            $services[] = ['order_id' => $order->id, 'service_id' => $product['id'], 'quantity' => $product['quantity']];
            }
        }        

    	DB::table('order_service')->insert($services);
    	return response()->json($order);
    }

    public function getServicesForCategory(Request $request, $id){
    	$services = Category::find($id)->services;        
    	return response()->json($services);
    }

    public function getAllOrders(){
        $orders = Order::with('services', 'services.category')->get();        
        $orders = $orders->map(function($order, $key) {
            $total = $order->services->reduce(function ($carry, $service) {
                return $carry + ($service->price * $service->pivot->quantity);
            }, 0);
            $order->total = $total;

            return $order;
        });

        foreach ($orders as $order){
           Log::debug('ID COMANDA: '.$order->id);
           Log::debug('CLIENT: '.$order->customer->registration_plate);
           Log::debug('ANGAJAT: '.$order->employee->name);
           foreach ($order->services as $service){
                if($service->category->name != 'barservice'){
                    Log::info('PACHETE:'. $service->name);
                }elseif ($service->category->name == 'barservice'){
                   Log::info('SERVICII:'. $service->name);
                }
           }
           Log::info('CREATA LA: '. $order->created_at);
           Log::info('TOTAL: '. $order->total. PHP_EOL);                                      
        }

/*        $fileSystemIterator = new FilesystemIterator('../storage/logs');
        $now = time();
        foreach ($fileSystemIterator as $file) {
            if ($now - $file->getCTime() >= 60 * 60 * 24 * 1) 
                unlink('../storage/logs'.$file->getFilename());
        }          */     
        
        return view('carwash_orders', ['orders' => $orders]);      
    }
    
    public function setOrder(Request $request, $id){
        $vehicles = Vehicle::all();

        $order = Order::with('customer', 'services', 'services.category')->where('id', $id)->first();

        $category = $order->services()
                        ->where('category_id', '<>', 1)
                        ->first()
                        ->category()
                        ->with('services')
                        ->first();

        $products = Category::where('name', 'barservice')->first()->services;

        $employees = Employee::all();

        $total = $order->services->reduce(function ($carry, $service) {
            return $carry + ($service->price * $service->pivot->quantity);
        }, 0);

        /* return response()->json($order);*/
        return view('carwash_update_order', [
            'order' => $order,
            'employees' => $employees,
            'vehicles' => $vehicles,
            'products' => $products,
            'category' => $category,
            'id' => $id,
            'total' => $total
            ]);
    }

    public function updateOrder(Request $request, $id){
        $input = $request->all();

        $client = Customer::firstOrNew(['registration_plate' => $input['customer']['plate']]);
        $client->registration_plate = $input['customer']['plate'];
        $client->phone_number = $input['customer']['phone'];
        $client->save();


        $order = Order::find($id);
        $order->employee_id = $input['employee'];
        $order->customer_id = $client->id;
        $order->save();

        $services = [];

        
        foreach ($input['services'] as $service) {
            $services[] = ['order_id' => $order->id, 'service_id' => $service, 'quantity' => 1];
        }

        if(isset($input['products'])){
            foreach ($input['products'] as $product) {
                $services[] = ['order_id' => $order->id, 'service_id' => $product['id'], 'quantity' => $product['quantity']];
            }
        }    

        DB::table('order_service')->where('order_id', '=', $id)->delete();
        DB::table('order_service')->insert($services);
        
        return response()->json($order);
    }

    public function removeOrder(Request $request){
        $input = $request->all();
        $id = $input['id'];
        $message = $input['message'];

        $order = Order::find($id);
        $order->deleted = $message;
        $order->save();
        
        return response()->json($id);
    }

    public function test(Request $request){
        $user = User::find(2);
        $user->password = \Hash::make('userpanda');
        $user->save();
    }

   public function getLogout(){
        Auth::logout();
        Session::flush();
        return redirect('/login');
   }
}