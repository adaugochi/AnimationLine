<?php

namespace App\Traits;

trait FormatDateTrait
{
    /**
     * @return false|string
     * @author Maryfaith Mgbede <adaamgbede@gmail.com>
     */
    public function formatDate()
    {
        return date("jS F Y h:i A", strtotime($this->created_at));
    }
}