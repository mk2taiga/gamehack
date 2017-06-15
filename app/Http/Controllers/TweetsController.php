<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tweet;

class TweetsController extends Controller
{
    
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tweets = Tweet::orderBY('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tweets' => $tweets,
            ];
        }
        
        return view('tweets.index', $data);
    }

    
    public function create()
    {
        $tweet = new Tweet;
        
        return view('tweets.create', [
            'tweet' => $tweet,
        ]);
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'game_name' => 'required|max:100',
            'content' => 'required',
        ]);
        
        $request->user()->tweets()->create([
            'title' => $request->title,
            'game_name' => $request->game_name,
            'content' => $request->content,
        ]);
        
        return redirect('/');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
