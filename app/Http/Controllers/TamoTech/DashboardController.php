<?php

namespace App\Http\Controllers\TamoTech;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('tamotech.dashboard');
    }
}
