<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Tweet;

class SearchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);
            
        return view('users.search', [
            'tweets' => $tweets,
        ]);
    }
    
    public function search(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'taste' => 'required',
        ]);
        
        $search1 = $request->input('type');
        $search2 = $request->input('taste');
        if ($search1 == '赤' && $search2 == '辛口') {
            $tweets = Tweet::where([['type', '赤'],['taste', '辛口']])->paginate(10);
        }
        
        elseif ($search1 == '赤' && $search2 == '甘口') {
            $tweets = Tweet::where([['type', '赤'],['taste', '甘口']])->paginate(10);
        }
        
        elseif ($search1 == '白' && $search2 == '辛口') {
            $tweets = Tweet::where([['type', '白'],['taste', '辛口']])->paginate(10);
        }
        
        elseif ($search1 == '白' && $search2 == '甘口') {
            $tweets = Tweet::where([['type', '白'],['taste', '甘口']])->paginate(10);
        }
        
        else {
            $tweets = Tweet::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('users.search', [
            'tweets' => $tweets,
        ]);
    }

}
