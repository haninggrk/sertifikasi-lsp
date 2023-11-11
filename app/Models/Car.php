<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Car
 * 
 * @property int $id
 * @property string $fuel_type
 * @property string $trunk_size
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Car extends Model
{
	protected $table = 'cars';

	protected $fillable = [
		'fuel_type',
		'trunk_size'
	];

	public function vehicle(){
		return $this->morphOne(Vehicle::class,'vehicleable');
	}
}
