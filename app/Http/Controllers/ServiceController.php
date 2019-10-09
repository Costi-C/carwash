<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Service;


class ServiceController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function getServices(){
        $services = DB::select('select name, price from services where category_id = 2');
        return ['services' => $services];
    }

}