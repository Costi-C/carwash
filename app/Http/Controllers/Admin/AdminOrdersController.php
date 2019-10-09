<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Order;


/**
* 
*/
class AdminOrdersController extends Controller{
	public function getCanceledOrders(){
        $orders = Order::with('services', 'services.category')->whereNotNull('deleted')->get();        
        $orders = $orders->map(function($order, $key) {
            $total = $order->services->reduce(function ($carry, $service) {
                return $carry + ($service->price * $service->pivot->quantity);
            }, 0);
            $order->total = $total;

            return $order;
        });

        return view('admin_orders_canceled', ['orders' => $orders]);
	}
}