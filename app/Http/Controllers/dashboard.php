<?php

namespace App\Http\Controllers;

use App\Models\modelUsers;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $data = modelUsers::all();
        return view('dashboard', compact('data'));
    }
}
