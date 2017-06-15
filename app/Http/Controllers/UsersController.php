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
