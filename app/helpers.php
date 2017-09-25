<?php

use App\Friend;
use App\Quarrel;
function friendship($friend_id)
{
	$friend_query = Friend::where([
		'user_id' => Auth::id(),
		'friend_id' => $friend_id,
	])->orWhere([
		'user_id' => $friend_id,
		'friend_id' => Auth::id(),
	])->first();

	$friendship = new stdClass();

	if ( ! is_null($friend_query)) {
		$friendship->exists = true;
		$friendship->accepted = $friend_query->accepted;
	} else {
		$friendship->exists = false;
		$friendship->accepted = false;
	}

	return $friendship;
}

function has_friend_invitation($friend_id)
{
	return Friend::where([
		'user_id' => $friend_id,
		'friend_id' => Auth::id(),
		'accepted' => 0,
	])->exists();
}

function belongs_to_auth($user_id)
{
	return (Auth::check() && $user_id === Auth::id());
}

function is_admin()
{
	return (Auth::check() && Auth::user()->role->type === 'admin');
}
function quarrel($quarrel_id)
{
	$quarrel_query = Quarrel::where([
		'user_id' => Auth::id(),
		'strange_id' => $quarrel_id,
	])->orWhere([
		'user_id' => $quarrel_id,
		'strange_id' => Auth::id(),
	])->first();
	
	
	$Quarrelship = new stdClass();

	if ( ! is_null($quarrel_query)) {
		$Quarrelship->exists = true;
		$Quarrelship->quarrel = $quarrel_query->quarrel;
	} else {
		$Quarrelship->exists = false;
		$Quarrelship->quarrel = false;
	}

	return $Quarrelship;
}

