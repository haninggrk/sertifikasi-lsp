<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderVehicle
 * 
 * @property int $id
 * @property int $order_id
 * @property int $vehicle_id
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Order $order
 * @property Vehicle $vehicle
 *
 * @package App\Models
 */
class OrderVehicle extends Model
{
	protected $table = 'order_vehicles';

	protected $casts = [
		'order_id' => 'int',
		'vehicle_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_id',
		'vehicle_id',
		'quantity'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}
}
