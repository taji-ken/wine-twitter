<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Tweet;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);
    }
    
    
    public function show($id)
    {
        $user = User::find($id);
        $tweets = $user->tweets()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'tweets' => $tweets,
        ];

        $data += $this->counts($user);


        return view('users.show', $data);
    }
    
    
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', [
            'user' => $user,
        ]);
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'favorite_type' => 'required|max:191',
            'favorite_taste' => 'required|max:191',
            'recommended_wine' => 'required|max:191',
        ]);
        
        User::find($id)->update([
            'name' => $request->name,
            'favorite_type' => $request->favorite_type,
            'favorite_taste' => $request->favorite_taste,
            'recommended_wine' => $request->recommended_wine,
        ]);
            
        $user = User::find($id);
        $tweets = $user->tweets()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'tweets' => $tweets,
        ];

        $data += $this->counts($user);


        return view('users.show', $data);
    }
    
    
    public function destroy($id)
    {
        $user = User::find($id);
        $tweets = $user->tweets();
        $tweets->delete();
        $user->delete();

        return redirect('/');
    }
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }


    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
}
