<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use \Datetime;

class HomeController extends Controller
{
    public function index(){
        $news=null;
        try {
            $client=new Client(['verify' => false]);
            //$request=$client->get('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=15a89f301f0145f8bca1b3241d320faa');
            $articles = json_decode($request->getBody());
            $news=$articles->articles;

          } catch (\Exception $e) {
            $path=public_path('news.json');
            // $news = Storage::get($path);
            $news = json_decode(file_get_contents($path));
            $news=$news->articles;
          }

        return view('index',['articles'=>$news]);
    }
}
