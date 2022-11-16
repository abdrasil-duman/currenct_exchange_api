<?php

namespace App\Console\Commands;

use Http\Client\Curl\Client;
use http\Client\Request;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class ParseCurrencyRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $request= new \GuzzleHttp\Psr7\Request('GET', env('CURRENCY_RATE_URL').'latest', ['apikey'=>env('CURRENCY_API_KEY')]);
        $response=$client->send($request);
        $data=$response->getBody();
        return $data->getContents();
    }
}
