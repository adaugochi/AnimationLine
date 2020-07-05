<?php

namespace App;

/**
 * @property string image_url
 * @property string orig_image_name
 * @property int admin_id
 * @property string title
 * @property string body
 * @property string key
 */
class Blog extends BaseModel
{
    protected $fillable = ['title', 'key', 'body', 'admin_id', 'image_url', 'orig_image_name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
