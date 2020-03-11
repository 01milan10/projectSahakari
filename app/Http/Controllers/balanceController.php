<?php

namespace App\Http\Controllers;

use App\Balance;
use http\Env\Response;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class balanceController extends Controller
{
    public function showReportForm(){
        return view('report.addDataReport');
    }

    public function addReport(Request $request){
        $this->validate($request,[

        ]);
        return back();
    }
    public function retrieveBalance(Request $request){
        if ($request->ajax()){
            $data = Balance::orderBy('collected_date','asc')->get();
            if ($data->count()>0){
                return response()->json($data);
            }
        }
    }
}
