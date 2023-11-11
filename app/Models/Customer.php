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
 * Class Customer
 * 
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $id_card_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
    use HasFactory;

	protected $table = 'customers';

	protected $fillable = [
		'name',
		'address',
		'phone',
		'id_card_number'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
