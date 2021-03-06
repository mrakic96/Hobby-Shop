<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
        
        'user_id', 'billing_email', 'billing_name', 'billing_address', 'billing_city',
        'billing_postalcode','billing_total',
    ];

    public function user() {

    	return $this->belongsTo('App\User');
    }
}
