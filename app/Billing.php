<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed sales_amount
 * @property mixed discount_price
 * @property mixed amount
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
 * @property mixed created_at
 * @property mixed currency
 * @property string payment_method
 * @property mixed id
 */
class Billing extends Model
{
    protected $fillable = [
        'package', 'currency', 'sales_amount', 'amount', 'has_discount', 'discount_price', 'payment_status',
        'city', 'state', 'country', 'postal_code', 'payment_method'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function create($request, $paymentId, $payerId)
    {
        $discountPrice = $request['discount_price'];

        $this->city = $request['city'];
        $this->state = $request['state'];
        $this->country = $request['country'];
        $this->postal_code = $request['postal_code'];
        $this->sales_amount = $request['sales_amount'];
        $this->discount_price = $discountPrice;
        $this->amount = $request['amount'];
        $this->package = $request['package'];
        $this->payment_id = $paymentId;
        $this->payer_id = $payerId;
        $this->currency = $request['currency'];
        $this->payment_method = $request['payment_method'];
        $this->user_id = auth()->user()->id;

        if ($discountPrice !== 0) {
            $this->has_discount = 1;
        }
        $this->save();
    }

    public function formatDate()
    {
        return date("jS F Y h:i A", strtotime($this->created_at));
    }

    public function getCurrencyAndAmount()
    {
        return $this->currency . ' ' . ($this->currency === 'NGN' ? number_format($this->amount/100) : $this->amount);
    }

    public static function hasDiscount()
    {
        return self::where('user_id', auth()->user()->id)->where('has_discount', 1)->count();
    }
}
