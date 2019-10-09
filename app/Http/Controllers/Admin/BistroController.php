<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Category;
use App\Service;

class BistroController extends Controller{

	public function getPackage(){		    
    	$services = Category::find(1)->services;
    	return view('admin_bar_products', ['services' => $services]);        
    	/*return response()->json($services);	*/    
	}

	public function addPackage(Request $request){
		$input = $request->all();
		$name = $input['name'];
		$price = $input['price'];
		$result = DB::table('services')
                    ->where('name', '=', $name)
                    ->where('category_id', '=',  1)
                    ->first();

        if ($result == null) {
            DB::table('services')->insert([
                ['name' => $name, 'category_id' => 1, 'price' => $price]
            ]);
        } else{
        	break;
        }
	}

	public function removePackage(Request $request){
		$input = $request->all();
		$id = $input['id'];
		DB::table('services')->where('id', '=', $id)->delete();
	}

	public function updatePackage(Request $request){
		$input = $request->all();
		$id = $input['id'];
		$name = $input['name'];
		$price = $input['price'];

		$serv = Service::find($id);
		$serv->name = $name;
		$serv->price = $price;
		$serv->save();
		return response()->json($input);
	}
}