<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Data;

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


    public function getIncubatorStatus(Request $req) {
        $status = Data::where("Key", "Status")->first()->pluck("Value");

        return response()->json(["status" => (int) $status]);
    }

    public function postTemperatureHumidityData(Request $req) {
        $temp = $req->input('temperature');
        $humidity = $req->input('humidity');

        Data::where("Key", "Temperature")->update(["Value" => $temp]);
        Data::where("Key", "Humidity")->update(["Value" => $humidity]);

        return response()->json(["done" => 1]);
    }

    


}
