<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $Today=Jalalian::now();
        $Slider=Slider::where('StartDate','<=',$Today)
            ->where('EndDate','>=',$Today)
            ->get();
        return view('Admin.dashboard')->with('Slider',$Slider);
    }
}
