<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    /**
     * Store sensor data (POST method).
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);
    
        // Create and save the new sensor data
        $sensorData = SensorData::create([
            'temperature' => $validated['temperature'],
            'humidity' => $validated['humidity'],
        ]);
    
        // Return a JSON response indicating success
        return response()->json([
            'message' => 'Data saved successfully',
            'data' => $sensorData
        ], 201);  // HTTP Status Code 201 indicates successful creation
    }
    
    
    
    /**
     * Retrieve all sensor data (GET method).
     */
    public function index()
    {
        // Retrieve the sensor data, including device_id
        $sensorData = SensorData::latest()->paginate(10);
    
        // Pass the data to the view
        return view('dashboard', compact('sensorData'));
    }
    
    
    
}
