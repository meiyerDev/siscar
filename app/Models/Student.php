<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Oct 2019 20:35:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $identity
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property \Carbon\Carbon $birthdate
 * @property string $phone
 * @property string $email
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $careers
 *
 * @package App\Models
 */
class Student extends Eloquent
{
	protected $dates = [
		'birthdate'
	];

	protected $fillable = [
		'identity',
		'first_name',
		'last_name',
		'gender',
		// 'birthdate',
		'phone',
		'email',
		'photo',
		'photo_license',
		'photo_license_2',
	];

	public function careers()
	{
		return $this->belongsToMany(\App\Models\Career::class, 'student_career')
					->withPivot('id')
					->withTimestamps();
	}
}
