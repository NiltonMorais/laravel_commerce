<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Category;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        factory('CodeCommerce\Product', 15)->create();
    }
}