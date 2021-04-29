<?php

namespace App;

/**
 * Class Order
 * @property int billing_id
 * @property mixed order_url
 *
 * @package App
 * @author Maryfaith Mgbede <adaamgbede@gmail.com>
 */
class Order extends BaseModel
{
    protected $fillable = ['billing_id', 'order_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }

    public function revisions()
    {
        return $this->hasMany(Revision::class);
    }
}
