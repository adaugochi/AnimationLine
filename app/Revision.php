<?php

namespace App;

use Illuminate\Support\Facades\DB;

/**
 * @property int order_id
 * @property int is_satisfied
 * @property string comment
 */
class Revision extends BaseModel
{
    protected $fillable = ['order_id', 'is_satisfied', 'comment'];

    public function create($request, $isSatisfied, $status)
    {
        DB::beginTransaction();

        try {
            $orderId = $request['order_id'];
            $this->order_id = $orderId;
            $this->is_satisfied = $isSatisfied;
            $this->comment = $request['comment'];
            $this->save();

            $billing = Order::find($orderId)->billing;
            $billing->status = $status;
            $billing->save();
        } catch (\Exception $ex) {
            DB::rollBack();
            return false;
        }
        DB::commit();
        return true;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}