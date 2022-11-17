<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyHistoryController extends Controller
{
    public function history(Request $request){
        $start_date = is_null($request['start_date']) ? date('Y-m-d') : $request['start_date'];
        $end_date=is_null($request['end_date'])
            ?date('Y-m-d')
            :$request['end_date'];
        if ($end_date<$start_date){
            return response('Start date cannot be more than End date');
        }
        $client = new \GuzzleHttp\Client();
        $request= new \GuzzleHttp\Psr7\Request('GET', env('CURRENCY_RATE_URL').'timeseries?start_date='.$start_date.'&&end_date='.$end_date, ['apikey'=>env('CURRENCY_API_KEY')]);
        $response=$client->send($request);
        $data=$response->getBody();
        return $data->getContents();
    }
}
