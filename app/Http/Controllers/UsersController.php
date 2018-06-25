<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; 
use App\Micropost; 


class UsersController extends Controller
{
    public function index()
    {
        // \Auth::user()->id
        //$favorites = User::paginate(10);
        
         return view('users.index', [
            'user' => \Auth::user(),
            'shops' => \Auth::user()->shops()->paginate(10),
         ]);
     }
    
    //   public function show($id)
    // {
        // $user = User::find($id);
        // $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        // $data = [
            // 'user' => $user,
            // 'microposts' => $microposts,
        // ];

        // $data += $this->counts($user);

        // return view('users.show', $data);
    // }
    
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'favorites' => $favorites,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }

   
    
    public function store(Request $request, $id)
    {
        \Auth::user()->favorite($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfavorite($id);
        return redirect()->back();
    }
    
}