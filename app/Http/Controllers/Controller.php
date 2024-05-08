<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;
use AfricasTalking\SDK\AfricasTalking;

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

    public function SendMessage($phone, $message)
    {
        $username = 'urukusec'; // use 'sandbox' for development in the test environment
        $apiKey   = '5e8bb4e45fe4d7269f1d557a9166ea33b403efb22b68dccb05814276d06a61a8'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $sms->send([
            'to'      => $phone,
            'message' => $message,
        ]);

        //print_r($result);
    }
}
