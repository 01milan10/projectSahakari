<?php

namespace App\Http\Controllers;

use App\Vision;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class visionController extends Controller
{
    public function showVisionForm()
    {
        return view('visionObjective.backendVisionObjective');
    }
    public function addVision(Request $request)
    {
        $this->validate($request, [
            'coreVision' => 'required',
            'coreMission' => 'required',
            'missionHead' => 'required',
        ]);
        $input = [
            'coreVision' => $request->coreVision,
            'coreMission' => $request->coreMission,
            'missionHead' => $request->missionHead,
        ];
        if (count($request['subMission'])) {
            foreach ($request['subMission'] as $sub) {
                $input['subMission'] = $sub;
                if (Vision::create($input)) {
                    Alert::Success('Success');
                } else {
                    Alert::Error('Error');
                }
            }
        }
        return back();
    }
}
