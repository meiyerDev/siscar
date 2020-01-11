<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Oct 2019 20:36:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class License
 * 
 * @property int $id
 * @property int $student_career_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class License extends Eloquent
{
	protected $casts = [
		'student_career_id' => 'int'
	];

	protected $fillable = [
		'student_career_id'
	];
}
