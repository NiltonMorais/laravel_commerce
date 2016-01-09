<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'status_id',
        'transaction_code',
        'payment_type_id',
        'netAmount',
    ];

    public function items()
    {
        return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function status()
    {
        return $this->belongsTo('CodeCommerce\OrderStatus');
    }

    public function paymentType()
    {
        return $this->belongsTo('CodeCommerce\OrderPaymentType');
    }
}
