<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Oct 2019 20:37:08 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RoleUser
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class RoleUser extends Eloquent
{
	protected $table = 'role_user';
}
