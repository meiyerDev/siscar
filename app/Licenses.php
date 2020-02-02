<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licenses extends Model
{
    protected $fillable = [
    	'student_id','career_id'
    ];

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function career()
    {
    	return $this->belongsTo(Career::class);
    }
}
