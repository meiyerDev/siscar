<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCareer extends Model
{
    protected $fillable = [
		'student_id',
		'career_id',
    ];

    public function students()
    {
    	return $this->hasMany(App\Student::class);
    }
}
