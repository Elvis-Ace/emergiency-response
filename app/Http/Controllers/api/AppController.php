<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Disastertype;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            $user->role = "user";
            $user->password = Hash::make($request->password);
            $user->save();
            return responder()->success($user);
        } else {
            return responder()->error(401, "User already Exists " . $request->email . "-" . $request->phone);
        }
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'min:7'],
            'password' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            return responder()->error(403, $validator->messages()->first())->respond(403);
        }
        $email = $request->email;
        $password = $request->password;
        $cr = ['email' => $email, 'password' => $password];

        $user = User::where('email', $email)->first();
        if (!$user || !Hash::check($password, $user->password)) {
            return responder()->error(403, 'Invalid Credentials')->respond(403);
        }
        $token = $user->createToken('Api Token of ' . $user->email);

        return responder()->success([
            'user' => $user,
            'token' => $token->plainTextToken
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
