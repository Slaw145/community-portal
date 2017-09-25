<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarrel extends Model
{
	protected $fillable = [
    'user_id', 'strange_id', 'quarrel','backquarrel',
	];
}
