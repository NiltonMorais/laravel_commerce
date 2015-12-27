<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

    public function findOrCreate($tagArray)
    {
        $tag = $this->where('name','=', $tagArray['name'])->first();
        if($tag){
            return $tag;
        }

        return $this->create($tagArray);
    }
}
