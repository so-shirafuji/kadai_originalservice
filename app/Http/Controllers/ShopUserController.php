<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\shop;

use App\Libraries\GurunaviAPI;
use App\Libraries\GurunaviAPIConfig;

class ShopUserController extends Controller
{
    public function favorite()
    {
        $shopId = request()->shopCode;

        //api seq
        $ins = new GurunaviAPI(GurunaviAPIConfig::API_KEY);
        $ins->SetRequestQuery('uris', $ins->GetUri('search'));
        $ins->SetRequestQuery('id', $shopId);
        //send and get http request
        $res = $ins->GetHttpRequest();

        // create shop, or get shop if an shop is found
        $shop = shop::firstOrCreate([
            'code' => $res->rest->id,
            'name' => $res->rest->name,
            'tel' => $res->rest->tel,
            'station' => $res->rest->access->station,
            'url' => $res->rest->url,
            'line' => $res->rest->access->line,
            'category' => $res->rest->category,
            'name_kana' => $res->rest->name_kana,
            'latitude' => $res->rest->latitude,
            'longitude' => $res->rest->longitude,
            'opentime' => $res->rest->opentime,
            // remove "?_ex=128x128" because its size is defined
            'image' => str_replace('?_ex=128x128', '', $res->rest->image_url->shop_image1),
            'address' => $res->rest->address,
        ]);

        \Auth::user()->favorite($shop->id);

        return redirect()->back();
    }

    public function unfavorite()
    {
        $shopCode = request()->shopCode;

        if (\Auth::user()->is_favoriteing($shopCode)) {
            //$shopId = shop::where('id', $shopCode)->first()->id;
            \Auth::user()->dont_favorite($shopCode);
        }
        return redirect()->back();
    }
}
