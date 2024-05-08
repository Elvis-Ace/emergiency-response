<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function success($message)
    {
        Alert::success('Success', $message);
    }

    public function error($message)
    {
        Alert::error('Error', $message);
    }

    public function validatePhone($phone)
    {
        if (strpos($phone, '0') === 0 && strlen($phone) == 10) {
            $nphone = "+254" . substr($phone, 1);
        } elseif (strpos($phone, '+') === 0 && strlen($phone) == 13) {
            $nphone = $phone;
        } elseif (strpos($phone, '2') === 0 && strlen($phone) == 12) {
            $nphone = "+" . $phone;
        } else {
            $nphone = false;
        }
        return $nphone;
    }
}
