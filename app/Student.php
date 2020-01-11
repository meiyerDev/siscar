<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
		'identity',
		'first_name',
		'first_s_name',
		'last_name',
		'last_s_name',
		'gender',
		'birthdate',
        'phone',
        'email',
    ];
}