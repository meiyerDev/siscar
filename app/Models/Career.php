<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Oct 2019 20:36:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Career
 * 
 * @property int $id
 * @property string $code
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $students
 *
 * @package App\Models
 */
class Career extends Eloquent
{
	protected $fillable = [
		'code',
		'name'
	];

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'student_career')
					->withPivot('id')
					->withTimestamps();
	}
}
