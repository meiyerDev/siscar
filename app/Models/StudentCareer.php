<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Oct 2019 20:36:34 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StudentCareer
 * 
 * @property int $id
 * @property int $student_id
 * @property int $career_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Career $career
 * @property \App\Models\Student $student
 *
 * @package App\Models
 */
class StudentCareer extends Eloquent
{
	protected $table = 'student_career';

	protected $casts = [
		'student_id' => 'int',
		'career_id' => 'int'
	];

	protected $fillable = [
		'student_id',
		'career_id'
	];

	public function career()
	{
		return $this->belongsTo(\App\Models\Career::class);
	}

	public function student()
	{
		return $this->belongsTo(\App\Models\Student::class);
	}
}
