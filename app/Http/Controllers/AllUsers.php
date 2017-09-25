<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Quarrel;
use Illuminate\Support\Facades\Auth;
use App\Notifications\QuarrelRequest;
class AllUsers extends Controller
{
	public function index()
	{
		$users = User::paginate(6);	
		
		return view('AllUsers.allusers',compact('users'));
	}
	public function confirm($strange_id)
	{
		Quarrel::insert([
		'user_id' => Auth::id(),
        'strange_id' => $strange_id,
		'quarrel' => 1,
		]);
		
		User::findOrFail($strange_id)->notify(new QuarrelRequest());
		
		return back();
	}
}
