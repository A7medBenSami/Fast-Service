<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    // private $loginUrl = 'https://client.almasafa.ly/api/MasafaRasaelLogin';
    // private $sendSmsUrl = 'https://client.almasafa.ly/api/sms/Send';
    // private $username = 'Fast service';
    // private $password = 'nnah1072AQ';
    // private $senderID = '13201';

    public function sendSms(Request $request)
    {

        $response = Http::asForm()->post('https://client.almasafa.ly/api/MasafaRasaelLogin', [
            'grant_type' => 'client_credentials',
            'username' => 'Fast service',
            'password' => 'nnah1072AQ',
        ]);

        $response = Http::asForm()->post('https://client.almasafa.ly/api/sms/Send', [
            'phoneNumber' => 'client_credentials',
            'message' => 'Fast service',
            'senderID' => '13201',
        ]);
    }
}