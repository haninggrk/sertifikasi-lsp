<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Motorcycle
 * 
 * @property int $id
 * @property int $luggage_size
 * @property int $fuel_capacity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Motorcycle extends Model
{
	protected $table = 'motorcycles';

	protected $casts = [
		'luggage_size' => 'int',
		'fuel_capacity' => 'int'
	];

	protected $fillable = [
		'luggage_size',
		'fuel_capacity'
	];



	public function vehicle(){
		return $this->morphOne(Vehicle::class,'vehicleable');
	}
}
