<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Disastertype;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function disastertypes()
    {
        $types = Disastertype::all();
        return responder()->success($types);
    }

    public function reports()
    {
        $reports = Report::all();
        return responder()->success($reports);
    }

    public function addreport(Request $request)
    {
        $type = Disastertype::where('name', $request->disaster)->first();
        if ($type != null) {
            $report = new Report();
            $report->description = $request->description;
            $report->disastertype_id = $type->iid;
            $report->user_id = Auth::user()->id;
            $filename = time() . '.' . $request->certificate->getClientOriginalExtension();
            $request->certificate->move(public_path('/assets/data/'), $filename);
            $report->files = $filename;
            $report->coodinates = $request->coordinates;
            $report->save();

            return responder()->success($report);
        } else {

            return responder()->error(401, "Disaster Type Does not Exist");
        }
    }
}
