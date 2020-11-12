<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SerieIngresso;

class APIController extends Controller
{
    public function getSeriesIngresso() {
        $data = SerieIngresso::get();
        return response()->json($data);
    }
}
