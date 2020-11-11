<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Exports\BalanceExport;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Resources\Balance as balanceResource;
use Carbon\Carbon;

class balanceController extends Controller
{
    public function getDeposits()
    {
        $deposits = Balance::whereYear('collected_date', date('Y'))->whereMonth('collected_date', date('m'))->orderBy('collected_date', 'ASC')->get();
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
            'name.*' => 'required|string|min:3',
            'email.*' => 'required|email:rfc',
            'deposit.*' => 'required|numeric',
            'withdraw.*' => 'required|numeric',
            'cName.*' => 'required|min:3',
            'collected_date.*' => 'required|date',
        ], [
            'required' => '*:attribute required',
            'email' => '*invalid email',
            'numeric' => '*numbers only',
            'min' => '*min 3 characters'

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
        $fileName = date('Y') . '-' . date('m') . '-' . date('d');
        if ($name != null) {
            $fileName = date('Y') . '-' . date('m') . '-' . date('d') . '(' . $request['data'] . ')';
            $data = Balance::where([
                ['collected_by', 'like', "%" . $name . "%"],
                ['collected_date', '=', today()],
            ])->get(['collected_by', 'deposited_amount', 'withdrawn_amount', 'collected_date', 'client_name']);
        } else {
            $data = Balance::where([
                ['collected_date', '=', today()],
            ])->get(['collected_by', 'deposited_amount', 'withdrawn_amount', 'collected_date', 'client_name']);
        }

        if (count($data) > 0) {
            if ($format == '.pdf') {
                $pdf = PDF::loadView('report.downloadReport', ['data' => $data]);
                return $pdf->download($fileName . $format);
            } else {
                return Excel::download(new BalanceExport($name), $fileName . $format);
            }
        } else {
            Alert::error("Error", "Report is empty");
            return back();
        }
    }
}
