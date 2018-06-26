<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\shop;

use App\Libraries\GurunaviAPI;
use App\Libraries\GurunaviAPIHelper;
use App\Libraries\GurunaviAPIConfig;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Libraries\TwitterAPIConfig;

class ShopsController extends Controller
 {

    public function create()
    {
        $area = (isset(request()->arealist)) ? request()->arealist : '';
        $keyword = (isset(request()->keyword)) ? request()->keyword : '';
        
        // read area code file
        $areaData = file_get_contents(public_path('dat/area_m.json'));
        $areaData = json_decode(GurunaviAPIHelper::unicode_decode($areaData))->garea_middle;
        
        //api seq
        $ins = new GurunaviAPI(GurunaviAPIConfig::API_KEY);
        $ins->SetRequestQuery('uris', $ins->GetUri('search'));
        $ins->SetRequestQuery('freeword', $keyword);
        $ins->SetRequestQuery('areacode', $area);
        //send and get http request
        $res = $ins->GetHttpRequest();

        // var_dump($area);
        // var_dump($keyword);
        // var_dump($res);
        
        $shops = [];
        //if rest is empty -> no restaurant found
        if(isset($res->rest)){
            $shops = $res->rest;
        }

        return view('shops.create', [
            'keyword' => $keyword,
            'shops' => $shops,
            // 'shops_meta' => $res->@attributes,
            'area' => $area,
            'areaData' => $areaData,
        ]);
    }
    
    //  public function show($id)
    // {
        
    //   $shop = shop::find($id);
    //   $favoiter_users = $shop->favorite_users;

    //   return view('shops.show', [
    //       'shop' => $shop,
    //       'favorite_users' => $favorite_users,
    //   ]);
    // }
    
    public function store(Request $request){
        //twitter API
        $connection = new TwitterOAuth(TwitterAPIConfig::API_KEY, TwitterAPIConfig::API_SECRET, TwitterAPIConfig::ACCESS_KEY, TwitterAPIConfig::ACCESS_SECRET);
        
        //get search result
        //get query name
        $restNames = explode(' ', $request->name);
        $restNameQuery;
        if(count($restNames) > 1){
            $restNameQuery = $restNames[(count($restNames)-1) - 1];
        }
        else{
            $restNameQuery = $request->name;
        }
        //send http request
        $statuses = $connection->get("search/tweets", ["q" => $restNameQuery, "tweet_mode" => "extended"]);
        
        //get images from tweets
        $twitterImages = [];
        foreach($statuses->statuses as $val){
            if( !isset($val->entities->media[0]->media_url) ){
                continue;
            }
            array_push($twitterImages, $val->entities->media[0]->media_url);
        }
        
        var_dump($restNames);
        var_dump($restNameQuery);
        // var_dump($statuses->statuses);
        var_dump($twitterImages);
        
        return view('shops.show', [
            'name' => $request->name,
            'image' => $request->image,
            'address' => $request->address,
            'name_kana' => $request ->name_kana,
            'latitude' => $request ->latitude,
            'longitude' => $request ->longitude,
            'category' => $request ->category,
            'url' => $request ->url,
            'tel' => $request ->tel,
            'line' => $request ->line,
            'station' => $request ->station,
            'opentime' => $request ->opentime,
            // 'favorite_users' => $favorite_users,
            'twitterImages' => $twitterImages,
        ]);
    }
  }