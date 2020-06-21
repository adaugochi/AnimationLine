<?php

namespace App;

use Exception;

/**
 * @property mixed amount
 * @property mixed package
 * @property int user_id
 * @property string city
 * @property string state
 * @property string country
 * @property mixed service
 * @property mixed token
 * @property mixed created_at
 * @property mixed id
 * @property string status
 * @property string currency
 */
class Billing extends BaseModel
{
    const IN_PROGRESS = 'in-progress';
    const DRAFT = 'draft';
    const CONFIRM = 'confirm';
    const COMPLETED = 'in-review';
    const DELIVERED = 'delivered';
    const PENDING = 'pending';
    const UNPAID = 'un-paid';

    const VIDEO = '2D animation video';
    const LOGO = 'logo animation';
    const TEXT = 'kinetic text typography animation';

    /**
     * @var array
     */
    protected $fillable = [
        'package', 'currency', 'amount', 'city', 'state', 'country', 'service', 'status',
        'payment_method', 'currency', 'reference'
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
     * @return mixed
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     * @throws Exception
     */
    public function create($request)
    {
        $this->city = $request['city'];
        $this->state = $request['state'];
        $this->country = $request['country'];
        $this->service = $request['service'];
        $this->amount = $request['amount'];
        $this->currency = $request['currency'];
        $this->package = $request['package'];
        $this->user_id = auth()->user()->id;

        if (!$this->save()) {
            throw new Exception('Could not save billing information');
        }
        return $this->id;
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
