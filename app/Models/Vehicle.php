<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Vehicle
 * 
 * @property int $id
 * @property string $model
 * @property Carbon $year
 * @property string $passenger_count
 * @property string $manufacturer
 * @property int $price
 * @property string $vehicleable_type
 * @property int $vehicleable_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Vehicle extends Model
{
	use HasFactory;
	protected $table = 'vehicles';

	protected $casts = [
		'year' => 'datetime:Y-m-d',
		'price' => 'int',
		'vehicleable_id' => 'int'
	];

	protected $fillable = [
		'model',
		'image_url',
		'year',
		'passenger_count',
		'manufacturer',
		'price',
		'vehicleable_type',
		'vehicleable_id'
	];

	public function orders()
	{
		return $this->belongsToMany(Order::class, 'order_vehicles')
					->withPivot('id', 'quantity')
					->withTimestamps();
	}

	public function vehicleable(){
		return $this->morphTo();
	}
}
