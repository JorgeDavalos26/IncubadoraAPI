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

    // For ESP32

    public function getIncubatorStatus(Request $req) {
        $status = Data::where("Key", "STATUS")->first();
        return response()->json(["status" => (int) $status["Value"]]);
    }

    public function postTemperatureHumidityData(Request $req) {
        $temp = $req->input('temperature');
        $humidity = $req->input('humidity');

        try {
            Data::where("Key", "TEMPERATURE")->update(["Value" => $temp]);
            Data::where("Key", "HUMIDITY")->update(["Value" => $humidity]);
        }
        catch(Exception $e) {
            return response()->json(["done" => 0]);
        }

        return response()->json(["done" => 1]);
    }

    // For Alexa

    public function getTemperatureHumidityData(Request $req) {
        $temperature = Data::where("Key", "TEMPERATURE")->first();
        $humidity = Data::where("Key", "HUMIDITY")->first();
        return response()->json([
            "temperature" => (float) $temperature["Value"],
            "humidity" => (float) $humidity["Value"],
        ]);
    }

    public function postIncubatorStatus(Request $req) {
        $status = $req->input('status');

        try {
            Data::where("Key", "STATUS")->update(["Value" => $status]);
        }
        catch(Exception $e) {
            return response()->json(["done" => 0]);
        }

        return response()->json(["done" => 1]);
    }

    


}
