<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed sales_amount
 * @property mixed discount_price
 * @property mixed total_amount
 * @property mixed package
 * @property int user_id
 * @property int has_discount
 * @property string city
 * @property string state
 * @property string country
 * @property mixed postal_code
 * @property string payment_status
 * @property mixed payment_id
 * @property mixed payer_id
 * @property mixed token
 */
class Billing extends Model
{
    protected $fillable = [
        'package', 'currency', 'sales_amount', 'total_amount', 'has_discount', 'discount_price', 'payment_status',
        'city', 'state', 'country', 'postal_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function create($request, $paymentId, $payerId, $token)
    {
        $discountPrice = $request['discount_price'];

        $this->city = $request['city'];
        $this->state = $request['state'];
        $this->country = $request['country'];
        $this->postal_code = $request['postal_code'];
        $this->sales_amount = $request['sales_amount'];
        $this->discount_price = $discountPrice;
        $this->total_amount = $request['total_amount'];
        $this->package = $request['package'];
        $this->payment_id = $paymentId;
        $this->payer_id = $payerId;
        $this->token = $token;
        $this->user_id = auth()->user()->id;

        if ($discountPrice !== "0") {
            $this->has_discount = 1;
        }
        $this->save();
    }
}
