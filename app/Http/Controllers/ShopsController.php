<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\shop;

use App\Libraries\GurunaviAPI;
use App\Libraries\GurunaviAPIConfig;

class ShopsController extends Controller
 {

    public function create()
    {
        $area = null;
        $keyword = request()->keyword;
        
        //api seq
        $ins = new GurunaviAPI(GurunaviAPIConfig::API_KEY);
        $ins->SetRequestQuery('uris', $ins->GetUri('search'));
        $ins->SetRequestQuery('freeword', '和食');
        $ins->SetRequestQuery('areacode', 'AREAM3001');
        
        $res = $ins->GetHttpRequest();
        // var_dump($res->rest);

        return view('shops.create', [
            'keyword' => $keyword,
            'shops' => $res->rest,
            // 'shops_meta' => $res->@attributes,
            'area' => $area,
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
            
        ]);
    }
  }