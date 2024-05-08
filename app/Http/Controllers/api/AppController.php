<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Disastertype;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        if ($user == null) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            return responder()->success($user);
        } else {
            return responder()->error(401, "User already Exists " . $request->email . "-" . $request->phone);
        }
    }


    public function login(Request $request)
    {
        $login = $request->email;
        $login = request()->input('data');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        request()->merge([$fieldType => $login]);
        $data = filter_var($login, FILTER_VALIDATE_EMAIL) ? $request->data : $this->validatePhone($request->data);

        $cr = [$fieldType => $data, 'password' => $request->password];
        if (!Auth::attempt($cr)) {
            return responder()->error(401, 'Credentials Dont Match');
        }
        $user = User::where($fieldType, $data)->first();
        return responder()->success([
            'user' => $user,
            'token' => $user->createToken('Api Token of ' . $user->name)
        ]);
    }
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
            $filename = time() . '.' . $request->data->getClientOriginalExtension();
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
