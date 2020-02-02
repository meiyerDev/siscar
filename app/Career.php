<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
		'code',
		'name',
    ];

    public function students()
    {
    	return $this->belongsToMany(Student::class,'student_career')
            ->withPivot('photo', 'photo_license_2')
            ->withTimestamps();
    }

    public function licenses()
    {
        return $this->hasMany(Licenses::class);
    }
}
