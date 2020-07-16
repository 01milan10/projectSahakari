<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Exports\BalanceExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Resources\Balance as balanceResource;

class balanceController extends Controller
{
    public function getDeposits()
    {
        $deposits = Balance::orderBy('created_at', 'DESC')->get('deposited_amount');
        return balanceResource::collection($deposits);
    }

    public function showReportForm()
    {

        $balances = Balance::where("collected_date", '=', today())->get();
        return view('report.addDataReport', ["balances" => $balances]);
    }

    public function addReport(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'deposit' => 'required',
            'withdraw' => 'required',
            'cName' => 'required',
            'collected_date' => 'required',
        ]);
        if (count($request["name"])) {
            for ($i = 0; $i < count($request["name"]); $i++) {
                Balance::create([
                    'client_name' => $request['name'][$i],
                    'client_email' => $request['email'][$i],
                    'deposited_amount' => $request['deposit'][$i],
                    'withdrawn_amount' => $request['withdraw'][$i],
                    'collected_by' => $request['cName'][$i],
                    'collected_date' => $request['collected_date'][$i],
                ]);
            }
        }
        Alert::success("Success", "Report Added Successfully");
        return back();
    }
    public function retrieveBalance(Request $request)
    {
        if ($request->ajax()) {
            $data = Balance::orderBy('collected_date', 'asc')->get();
            if ($data->count() > 0) {
                return response()->json($data);
            }
        }
    }

    public function downloadCollectorReport(Request $request)
    {
        $name = $request['data'];
        $format = $request['format'];
        $data = Balance::where([
            ['collected_by', 'like', "%" . $name . "%"],
            ['collected_date', '=', today()],
        ])->get(['collected_by', 'deposited_amount', 'collected_date', 'client_name']);

        if ($name != null && count($data) > 0) {
            if ($format == '.pdf') {
                $pdf = PDF::loadView('report.downloadReport', ['data' => $data]);
                return $pdf->download($name . $format);
            } else {
                return Excel::download(new BalanceExport($name), $name . $format);
            }
        } else {
            Alert::error("Error", "Unavailable");
            return back();
        }
    }
}
