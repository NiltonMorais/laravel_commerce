<?php

namespace CodeCommerce;


class Cart
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add(Product $product)
    {
        $id = $product->id;

        if(count($product->images))
           $img = 'uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension;
        else
            $img = 'images/no-img.jpg';

        $this->items += [
            $id => [
                'qtd' => isset($this->items[$id]['qtd']) ? $this->items[$id]['qtd']++ : 1,
                'price' => $product->price,
                'name' => $product->name,
                'image' => $img,
            ]
        ];

        return $this->items;
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;

        foreach($this->items as $item){
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }

    public function setQtd($id, $qtd)
    {
        if($qtd > 0){
            $this->items[$id]['qtd'] = $qtd;
        }
    }

    public function clear()
    {
        $this->items = [];
    }

}