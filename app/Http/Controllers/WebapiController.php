<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebapiController extends Controller
{
    public function index()
    {
        $keyword = '';
        $response = null;

        $url = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706';
        
        // applicationIdの 'xxxxx....' は取得したアプリIDに書き換える
        $params = [
            'format' => 'json',
            'applicationId' => '1029325875692306311',
            'hits' => 5,
            'imageFlag' => 1,
            'NGKeyword' => 'セット ケース',
            'sort' => '-reviewCount'
        ];

        $query = http_build_query($params, "", "&");
        $search_url_red = $url . '?' . $query . '&keyword=' . '赤ワイン　甘口';
        $response_red = json_decode(file_get_contents($search_url_red));  // JSONデータをオブジェクトにする
        
        $search_url_white = $url . '?' . $query . '&keyword=' . '白ワイン　甘口';
        $response_white = json_decode(file_get_contents($search_url_white));  // JSONデータをオブジェクトにする
        
        return view('webapi.index', [
            'response_red' => $response_red,
            'response_white' => $response_white,
        ]);
    }
}
