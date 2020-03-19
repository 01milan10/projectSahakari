<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Exports\BalanceExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class balanceController extends Controller
{
    public function showReportForm(){

        $balances = Balance::where("collected_date",'=',today())->get();
        return view('report.addDataReport',["balances"=>$balances]);
    }

    public function addReport(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'deposit'=>'required',
            'withdraw'=>'required',
            'cName'=>'required',
            'collected_date'=>'required',
        ]);
        if(count($request["name"])){
            for ($i=0;$i<count($request["name"]);$i++){
                Balance::create([
                    'client_name'=>$request['name'][$i],
                    'client_email'=>$request['email'][$i],
                    'deposited_amount'=>$request['deposit'][$i],
                    'withdrawn_amount'=>$request['withdraw'][$i],
                    'collected_by'=>$request['cName'][$i],
                    'collected_date'=>$request['collected_date'][$i],
                ]);
            }
        }
        Alert::success("Success","Report Added Successfully");
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

    public function downloadCollectorReport(Request $request){
        $name=$request['data'];
        if($name != null){
            return Excel::download(new BalanceExport($name),$name.".pdf");
        }
        else{
            Alert::error("Error","Please enter the collector's name");
            return back();
        }
    }
}
