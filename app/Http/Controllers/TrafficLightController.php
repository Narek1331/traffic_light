<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class TrafficLightController extends Controller
{
    /**
     * render traffic_light page
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('traffic_light');
    }
     /**
     * Store the log
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function log(Request $request)
    {
        $message = $request->input('message');
        Log::create(['message' => $message]);
        return response()->json(['success' => true]);
    }

    /**
     * Get the logs
     * @return \Illuminate\Http\JsonResponse
     */
    public function getLogs()
    {
        $logs = Log::select('message', 'created_at as time')
        ->orderBy('id', 'desc')
        ->limit(10)
        ->get();
        return $logs->reverse()->values();
    }
}
