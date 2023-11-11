<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property int $customer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Collection|Vehicle[] $vehicles
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'customer_id' => 'int',
		
	];

	protected $fillable = [
		'customer_id',
		'quantity',
		'vehicle_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}
}
