<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UsersController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $user = User::find($id);
        $tweets = $user->tweets()->orderBY('created_at', 'desc')->paginate(10);
        
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
            'name' => 'required|max:255',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        
        return redirect()->route('users.show', ['id' => $id])->with('success', 'プロフィールを編集しました。');
    }

    
    public function destroy($id)
    {
        //
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
    
    public function favoritings($id)
    {
        $user = User::find($id);
        $tweets = $user->favoritings()->paginate(10);
        
        $data = [
            'user' => $user,
            'tweets' => $tweets,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favoritings', $data);
    }
}
