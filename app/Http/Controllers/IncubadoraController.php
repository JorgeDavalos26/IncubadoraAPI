<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncubadoraController extends Controller
{
    
    public function testGet(Request $req) {
        

        return response()->json("test get!");
    }

    public function testPost(Request $req) {


        return response()->json("test post!");
    }

    public function testPut(Request $req) {


        return response()->json("test put!");
    }

    public function testDelete(Request $req) {


        return response()->json("test delete!");
    }




}
