<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
    	$user = User::all()->where('id',Auth::user()->id);;
    	$userId = Auth::user()->id;
    	return view('user.users.index')->with('user',$user)->with('userId',$userId);
    }

    public function destroy($id){
    	$user = User::find($id);
    	$user->delete();
    	return redirect('/');
    }
}
