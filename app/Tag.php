<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function produts()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }
}
