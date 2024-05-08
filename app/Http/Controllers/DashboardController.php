<?php

namespace App\Http\Controllers;

use App\Models\Disastertype;
use App\Models\Report;
use App\Models\User;
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

    public function reports()
    {
        $data = [
            'title' => "Reports",
            'reports' => Report::all(),
            'types' => Disastertype::all()
        ];

        return view('dashboard.reports', $data);
    }


    public function notifications()
    {
        $data = [
            'title' => "Notify People",
        ];

        return view('dashboard.notification', $data);
    }

    public function notify(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            $this->SendMessage($user->phone, $request->message);
        }
        $this->success("Message Sent Successful");
        return redirect()->back();
    }
}
