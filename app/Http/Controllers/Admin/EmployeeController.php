<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Employee;

class EmployeeController extends Controller
{
    public function getEmployees(Request $request){       
        $employees =  DB::table('employees')        
        ->leftJoin('orders', function ($join) {
            $join->on('orders.employee_id', '=', 'employees.id')
                ->whereNull('orders.deleted');
        })
        ->leftJoin('order_service', 'orders.id', '=', 'order_service.order_id')
        ->leftJoin('services', function ($join) {
            $join->on('services.id', '=', 'order_service.service_id')
                ->where('services.category_id', '<>', 1);
        })
        ->select(DB::raw('employees.id, employees.name, IFNULL(SUM(order_service.quantity * services.price), 0) as total, IFNULL(COUNT(orders.id), 0) AS orders'))     
        ->groupBy('employees.id', 'employees.name')
        ->get();
        
    	return view('admin_employee_track', ['employees' => $employees]);    	
    }

    public function addEmployee(Request $request){
    	$employees = Employee::all();    	
    	return view('admin_employee_add', ['employees' => $employees]);    	
    }

    public function removeEmployee(Request $request){
    	$input = $request->all();
    	$employeeId = $input['id'];    	
    	DB::table('employees')->where('id', '=', $employeeId)->delete();
    	$employees = Employee::all();    	    	
    	return response()->json($employees);    	
    }

    public function saveEmployee(Request $request){
    	$input = $request->all();
    	$name = $input['name'];
    	$employee = new Employee;
    	$employee->name = $name;
    	$employee->save();                      
    	return response()->json($employee);    		
    }

    public function showEmployeeTrack(Request $request){  
        $input = $request->all();

        $employees =  DB::table('employees')
        ->leftJoin('orders', function ($join) use ($input) {
            $join->on('orders.employee_id', '=', 'employees.id')
                ->whereNull('orders.deleted')
                ->whereBetween('orders.created_at', [$input['start'], $input['end']]);
        })
        ->leftJoin('order_service', 'orders.id', '=', 'order_service.order_id')
        ->leftJoin('services', function ($join) {
            $join->on('services.id', '=', 'order_service.service_id')
                ->where('services.category_id', '<>', 1);
        })        
        ->select(DB::raw('employees.id, employees.name, IFNULL(SUM(order_service.quantity * services.price), 0) as total, IFNULL(COUNT(orders.id), 0) AS orders'))
        ->groupBy('employees.id', 'employees.name')
        ->get();
        return response()->json($employees);
    }
}