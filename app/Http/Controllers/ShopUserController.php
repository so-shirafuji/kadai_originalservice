<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

class ShopUserController extends Controller
{
    public function favorite()
    {
        $shopCode = request()->shopCode;

        // Search shops from "shopCode"
        $client = new \RakutenRws_Client();
        $client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));
        $rws_response = $client->execute('IchibashopSearch', [
            'shopCode' => $shopCode,
        ]);
        $rws_shop = $rws_response->getData()['shops'][0]['shop'];

        // create shop, or get shop if an shop is found
        $shop = shop::firstOrCreate([
            'code' => $rws_shop['shopCode'],
            'name' => $rws_shop['shopName'],
            'url' => $rws_shop['shopUrl'],
            // remove "?_ex=128x128" because its size is defined
            'image_url' => str_replace('?_ex=128x128', '', $rws_shop['mediumImageUrls'][0]['imageUrl']),
        ]);

        \Auth::user()->favorite($shop->id);

        return redirect()->back();
    }

    public function dont_favorite()
    {
        $shopCode = request()->shopCode;

        if (\Auth::user()->is_favoriteing($shopCode)) {
            $shopId = shop::where('code', $shopCode)->first()->id;
            \Auth::user()->dont_favorite($shopId);
        }
        return redirect()->back();
    }
}
