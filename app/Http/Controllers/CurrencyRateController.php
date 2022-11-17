<?php

namespace App\Http\Controllers;

use App\Console\Commands\ParseCurrencyRate;
use App\Console\Kernel;
use http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyRateController extends Controller
{
    public function index(Request $request)
    {
        $currencyRate = new ParseCurrencyRate();
        $response = $currencyRate->handle();
        return $response;
    }
}
