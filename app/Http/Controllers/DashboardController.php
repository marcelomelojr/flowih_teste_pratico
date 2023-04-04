<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $cars = Car::where('user_id', auth()->id())->paginate(10);
        return view('dashboard', [
            'cars' => $cars
        ]);
    }


}
