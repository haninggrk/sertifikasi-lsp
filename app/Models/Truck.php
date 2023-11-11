<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Truck
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Truck extends Model
{
	protected $fillable=["wheel_count","cargo_size"];
	protected $table = 'trucks';

	public function vehicle(){
		return $this->morphOne(Vehicle::class,'vehicleable');
	}
}
