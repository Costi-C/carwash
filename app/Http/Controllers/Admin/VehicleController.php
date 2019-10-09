<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Vehicle;
use App\Service;


class VehicleController extends Controller{ 

    public function getVehicles(Request $request){
    	$vehicles = Vehicle::all();    	
    	return view('admin_vehicles', ['vehicles' => $vehicles]);    	
    }

    public function removeVehicle(Request $request){
        $input = $request->all();
        $vehicleId = $input['id'];     
/*        DB::table('vehicles')->where('id', '=', $vehicleId)->delete();
        $vehicles = Vehicle::all();     */          
        return response()->json($vehicleId);        
    }

    public function getPackage(Request $request){       
        $packages = Vehicle::with('category', 'category.services')->get();       
        return view('admin_vehicles_packages', ['packages' => $packages]);    
    }

    public function updatePackage(Request $request){
       $input = $request->all();
       $id = $input['id'];
       $name = $input['name'];
       $price = $input['price'];       
       DB::table('services')
            ->where('id', '=', $id)
            ->update(['name' => $name, 'price' => $price]);
       $vehicle = Vehicle::where('id', $id)->first();
       return response()->json($vehicle);
    }

    public function addPackage(Request $request){
        $input = $request->all();
        $name = $input['name'];
        $categoryId = $input['id'];       
        $price = $input['price'];
        $result = DB::table('services')
                    ->where('name', '=', $name)
                    ->where('category_id', '=',  $categoryId)
                    ->first();
        /*return response()->json($result);*/

        if ($result == null){
            DB::table('services')->insert([
                ['name' => $name, 'category_id' => $categoryId, 'price' => $price]
            ]);   
        }else{
            break;
        }               
        return response()->json($result);
    }

    public function removePackage(Request $request){
        $input = $request->all();
        $id = $input['id'];
        DB::table('services')->where('id', '=', $id)->delete();
        return response()->json($id);
    }
}