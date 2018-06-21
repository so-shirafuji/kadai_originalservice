<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

class ShopsController extends Controller
 {

    public function create()
    {
        $area = null;
        $keyword = request()->keyword;
        $shops = [];
        if ($keyword) {
            //$client = new \RakutenRws_Client();
            //$client->setApplicationId(env('RAKUTEN_APPLICATION_ID'));

            // $rws_response = $client->execute('IchibashopSearch', [
            //     'keyword' => $keyword,
            //     'imageFlag' => 1,
            //     'hits' => 20,
            // ]);

            // Creating "shop" instance to make it easy to handle.（not saving）
            foreach ($rws_response->getData()['shops'] as $rws_shop) {
                $shop = new shop();
                $shop->code = $rws_shop['shop']['shopCode'];
                $shop->name = $rws_shop['shop']['shopName'];
                $shop->location = $rws_shop['shop']['shopLocation'];
                $shop->url = $rws_shop['shop']['shopUrl'];
                $shop->image_url = str_replace('?_ex=128x128', '', $rws_shop['shop']['mediumImageUrls'][0]['imageUrl']);
                $shops[] = $shop;
            }
        }

        return view('shops.create', [
            'keyword' => $keyword,
            'shops' => $shops,
            'area' => $area,
        ]);
    }
    
     public function show($id)
    {
      $shop = shop::find($id);
      $favoiter_users = $shop->favorite_users;

      return view('shops.show', [
          'shop' => $shop,
          'favorite_users' => $favorite_users,
      ]);
    }
  }