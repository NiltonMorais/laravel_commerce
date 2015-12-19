<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function produts()
    {
        return $this->belongsToMany('CodeCommerce\Product');
    }

    public function findOrCreate($tagArray)
    {
        $tag = $this->where('name','=', $tagArray['name'])->firt();
        if($tag){
            return $tag;
        }

        return $this->create($tagArray);
    }
}
