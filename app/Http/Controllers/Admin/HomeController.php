<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Employee;
use App\Vehicle;  
use Carbon\Carbon;


class HomeController extends Controller{ 
	
	public function homeDetails(){
		$mytime = Carbon::today()->format('Y-m-d');
		$start = $mytime . " 00:00:00";
		$end = $mytime . " 23:59:59";
		$employees = Employee::all()->count();
		$vehicles = Vehicle::all()->count();

		$incasari = DB::table('order_service')
		->join('orders', function ($join) {
			$join->on('order_service.order_id', '=', 'orders.id')
			->whereNull('orders.deleted');
		})
		->join('services', function ($join) use($start, $end){
			$join->on('services.id', '=', 'order_service.service_id')
			->whereBetween('order_service.created_at', [$start, $end])
			->where('services.category_id', '<>', 1);
		})
		->select(DB::raw('IFNULL(SUM(order_service.quantity * services.price), 0) as total'))          
		->first();

		$venit = DB::table('order_service')
		->join('orders', function ($join) {
			$join->on('order_service.order_id', '=', 'orders.id')
			->whereNull('orders.deleted');
		})
		->join('services', function ($join) use($start, $end){
			$join->on('services.id', '=', 'order_service.service_id')
			->whereBetween('order_service.created_at', [$start, $end])
			->where('services.category_id', '=', 1);
		})
		->select(DB::raw('IFNULL(SUM(order_service.quantity * services.price), 0) as total'))          
		->first();

		return view('admin_home',[
			'total' => $incasari,
			'venit' => $venit,					
			'employees' => $employees,
			'vehicles' => $vehicles,
			'date' => $mytime
			]);
	}

	public function updateType(Request $request){
		$input = $request->all();

		$vehtype = Vehicle::find($input['id']);
		$vehtype->type = $input['type'];
		$vehtype->save();
/*		$response = DB::table('categories')
		->where('categories.id', '=', $input['id'])        
        ->update(['categories.name' => $input['type']]);*/
		return response()->json($vehtype);
	}

	public function getLogout(){
		Auth::logout();
		Session::flush();
		return redirect('/login');
	}
}