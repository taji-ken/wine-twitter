<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tweets = $user->tweets()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tweets' => $tweets,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'type' => 'required|max:191',
            'taste' => 'required|max:191',
        ]);

        $request->user()->tweets()->create([
            'content' => $request->content,
            'type' => $request->type,
            'taste' => $request->taste,
        ]);

        return back();
    }
    
    public function destroy($id)
    {
        $tweet = \App\Micropost::find($id);

        if (\Auth::id() === $tweet->user_id) {
            $tweet->delete();
        }

        return back();
    }
}
