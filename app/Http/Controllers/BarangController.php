<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\modelUsers;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    function index() {
        $databr = barangModel::all();
        $datausr = modelUsers::all();

        return view('barang', compact('databr', 'datausr'));
    }
}
