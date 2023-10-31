<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\C2b;

class C2bController extends Controller
{
    public function createValidationResponse($result_code, $result_description)
    {
        $result = json_encode(["ResultCode" => $result_code, "ResultDesc" => $result_description]);
        $response = new Response();
        $response->headers->set("Content-Type", "application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

    public function mpesaValidation()
    {
        $result_code = 0;
        $result_description = "Accepted";
        return $this->createValidationResponse($result_code, $result_description);
    }

    public function mpesaAccessToken()
    {
        $consumer_key = "us5JuylqAGulh24ERWdDn5BhEV44bgAa";
        $consumer_secret = "YlrJTnlk4KxMwCok";
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_response = curl_exec($curl);
        $access_token = json_decode($curl_response)->access_token;
        return $access_token;
    }

    public function mpesaRegisterUrls()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.safaricom.co.ke/mpesa/c2b/v2/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $this->mpesaAccessToken())); //setting custom header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            'ShortCode' => "8008575",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://5600-41-139-154-19.ngrok-free.app/praise/payment/confirmation",
            'ValidationURL' => "https://5600-41-139-154-19.ngrok-free.app/praise/validation"
        ]));

        $curl_response = curl_exec($curl);
        echo $curl_response;
    }

    public function mpesaConfirmation(Request $request)
    {
        try {
            DB::beginTransaction();
            $content = json_decode($request->getContent());
            Log::info("message", ["content" => $content]);
            $mpesa_transaction = new C2b();
            $mpesa_transaction->TransactionType = $content->TransactionType;
            $mpesa_transaction->TransID = $content->TransID;
            $mpesa_transaction->TransTime = $content->TransTime;
            $mpesa_transaction->TransAmount = $content->TransAmount;
            $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
            $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
            $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
            $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
            $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
            $mpesa_transaction->MSISDN = $content->MSISDN;
            $mpesa_transaction->FirstName = $content->FirstName;
            $mpesa_transaction->MiddleName = '';
            $mpesa_transaction->LastName = '';
            $mpesa_transaction->save();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
        }
    }
}
