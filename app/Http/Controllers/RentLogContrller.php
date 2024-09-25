<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RentLogContrller extends Controller
{
    public function rentlogs_view()
    {
        return view('rentlogs');
    }
}
