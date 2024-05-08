<?php

namespace App\Http\Controllers;

use App\Models\Disastertype;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Dashboad"
        ];

        return view('dashboard.index', $data);
    }

    public function heatmap()
    {
        $data = [
            'title' => "Heatmap"
        ];

        return view('dashboard.heatmap', $data);
    }

    public function types()
    {
        $data = [
            'title' => "Disaster Types",
            'types' => Disastertype::all()
        ];

        return view('dashboard.types', $data);
    }

    public function addtype(Request $request)
    {
        $check = Disastertype::where('name', $request->name)->first();
        if ($check == null) {
            $distype = new Disastertype();
            $distype->name = $request->name;
            $distype->save();
            $this->success("Saved Successfully");
        } else {
            $this->error("Type Already Exists");
        }

        return redirect()->back();
    }
}
