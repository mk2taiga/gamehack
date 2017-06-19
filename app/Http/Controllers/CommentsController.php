<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;

class CommentsController extends Controller
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
        $this->validate($request, [
            'content' => 'required|max:255',
        ]);
        
        $tweet_id = request()->tweet_id;
        
        $request->user()->comments()->create([
            'content' => $request->content,
            'tweet_id' => $tweet_id,
        ]);
        
        return redirect()->back()->with('success', 'コメントを投稿しました。');
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

    
    public function destroy($id, $comments)
    {   
        $comment = Comment::find($comments);
        
        if (\Auth::user()->id == $comment->user_id) {
            $comment->delete();
        }
        
        return redirect()->back()->with('success', 'コメントを削除しました。');
    }
}
