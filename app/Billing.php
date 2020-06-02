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
 * @property mixed service
 * @property string payment_status
 * @property mixed payment_id
 * @property mixed payer_id
 * @property mixed token
 * @property mixed created_at
 * @property mixed currency
 * @property string payment_method
 * @property mixed id
 * @property string status
 */
class Billing extends BaseModel
{
    const IN_PROGRESS = 'in-progress';
    const DRAFT = 'draft';
    const CONFIRM = 'confirm';
    const COMPLETED = 'in-review';
    const DELIVERED = 'delivered';
    const PENDING = 'pending';

    const VIDEO = '2D animation video';
    const LOGO = 'logo animation';
    const TEXT = 'kinetic text typography animation';

    /**
     * @var array
     */
    protected $fillable = [
        'package', 'currency', 'sales_amount', 'amount', 'has_discount', 'discount_price', 'payment_status',
        'city', 'state', 'country', 'service', 'payment_method', 'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    /**
     * @param $request
     * @param $paymentId
     * @param $payerId
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function create($request, $paymentId, $payerId)
    {
        $discountPrice = $request['discount_price'];

        $this->city = $request['city'];
        $this->state = $request['state'];
        $this->country = $request['country'];
        $this->service = $request['service'];
        $this->sales_amount = $request['sales_amount'];
        $this->discount_price = $discountPrice;
        $this->amount = $request['amount'];
        $this->package = $request['package'];
        $this->payment_id = $paymentId;
        $this->payer_id = $payerId;
        $this->currency = $request['currency'];
        $this->payment_method = $request['payment_method'];
        $this->user_id = auth()->user()->id;

        if ((int)$discountPrice !== 0) {
            $this->has_discount = 1;
        }
        $this->save();
    }

    /**
     * @return string
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function getCurrencyAndAmount()
    {
        return $this->currency . ' ' . ($this->currency === 'NGN' ? number_format($this->amount/100) : $this->amount);
    }

    /**
     * @return mixed
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public static function hasDiscount()
    {
        return self::where('user_id', auth()->user()->id)->where('has_discount', 1)->count();
    }
}
