<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $data = DB::table('data')
        ->select('*')
        ->whereNotNull('ket_data')
        ->get();
        
        return view('history',[
            'datas' => $data,
        ]);
    }
}
